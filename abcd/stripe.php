<?php

/*
 * ==========================================================
 * STRIPE.PHP
 * ==========================================================
 *
 * Process Stripe payments
 *
 */

header('Content-Type: application/json');
$raw = file_get_contents('php://input');
$response = json_decode($raw, true);

if ($response && isset($response['id']) && empty($response['error'])) {
    require('functions.php');
    switch ($response['type']) {
        case 'checkout.session.completed':
            $response = bxc_stripe_curl('events/' . $response['id'], 'GET');
            $data = $response['data']['object'];
            bxc_db_query('UPDATE bxc_transactions SET `from` = "' . bxc_db_escape($data['customer']) . '", status = "C" WHERE id = ' . bxc_db_escape($data['client_reference_id']));
            break;
    }
}

?>