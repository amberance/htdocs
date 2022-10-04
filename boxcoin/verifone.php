<?php

/*
 * ==========================================================
 * VERIFONE.PHP
 * ==========================================================
 *
 * Process 2Checkout Verifone payments
 *
 */

header('Content-Type: application/json');
$raw = file_get_contents('php://input');

if ($raw) {
    require('functions.php');
    $response = [];
    $raws = explode('&', urldecode($raw));
    for ($i = 0; $i < count($raws); $i++) {
        $value = explode('=', $raws[$i]);
        $response[$value[0]] = str_replace('\/', '/', $value[1]);
    }
    if (bxc_isset($response, 'ORDERSTATUS') == 'PAYMENT_AUTHORIZED') {
        date_default_timezone_set('UTC');
        $result = '';
        $hash_received = $response['HASH'];
        unset($response['HASH']);
        foreach ($response as $key => $val) {
            $result .= bxc_array_expand((array)$val);
        }
        $hash = bxc_hmac(bxc_settings_get('verifone-key'), $result);
        if ($hash == $hash_received) {
            bxc_db_query('UPDATE bxc_transactions SET `from` = "' . bxc_db_escape($response['REFNO']) . '", status = "C" WHERE id = ' . bxc_db_escape($response['REFNOEXT']));
            die('<EPAYMENT>' . $response['IPN_DATE'] . '|' . $hash . '</EPAYMENT>');
        }
    }
}

function bxc_array_expand($array) {
    $retval = '';
    foreach($array as $i => $value) {
        if (is_array($value)) {
            $retval .= bxc_array_expand($value);
        } else {
            $size = strlen($value);
            $retval .= $size.$value;
        }
    }
    return $retval;
}

function bxc_hmac($key, $data){
    $b = 64;
    if (strlen($key) > $b) $key = pack('H*', md5($key));
    $key = str_pad($key, $b, chr(0x00));
    $ipad = str_pad('', $b, chr(0x36));
    $opad = str_pad('', $b, chr(0x5c));
    $k_ipad = $key ^ $ipad ;
    $k_opad = $key ^ $opad;
    return md5($k_opad . pack('H*', md5($k_ipad . $data)));
}

?>