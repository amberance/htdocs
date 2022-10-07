<?php

/*
 * ==========================================================
 * PAY.PHP
 * ==========================================================
 *
 * Payment page
 *
 */

if (!file_exists(__DIR__ . '/config.php')) die();
require(__DIR__ . '/functions.php');
$logo = bxc_settings_get('logo-pay');
if (isset($_GET['invoice'])) {
    $invoice = bxc_transactions_invoice($_GET['invoice']);
    die($invoice ? '<script>document.location = "' . $invoice . '"</script>' : 'Transaction not found or not completed.');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>
        <?php bxc_e(bxc_settings_get('form-title', 'Payment method')) ?>
    </title>
    <link rel="shortcut icon" type="image/svg" href="<?php echo $logo ? bxc_settings_get('logo-icon-url', BXC_URL . 'media/icon.svg') : BXC_URL . 'media/icon.svg' ?>" />
    <script id="boxcoin" src="<?php echo BXC_URL ?>js/client.js"></script>
    <style>
    body {
        text-align: center;
        padding: 100px 0;
    }

    .bxc-main {
        text-align: left;
        margin: auto;
    }

    .bxc-pay-logo {
        text-align: center;
    }

    .bxc-pay-logo img {
        margin: 0 auto 30px auto;
        max-width: 300px;
    }
    </style>
</head>
<body style="display: none">
    <script>(function () { setTimeout(() => { document.body.style.removeProperty('display') }, 500) }())</script>
    <?php
    if ($logo) echo '<div class="bxc-pay-logo"><img src="' . bxc_settings_get('logo-url') . '" alt="" /></div>';
    bxc_checkout_direct();
    ?>
</body>
</html>