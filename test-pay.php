<?php

include_once "includes/connect.php";
//define('DB_SERVER', 'localhost');
//define('DB_USERNAME', 'dizzy');
//define('DB_PASSWORD', 'password');
//define('DB_DATABASE', 'dizzy');
//$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die(mysqli_connect_error());
$price=10;
try {
  //$db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  echo "<h2>TODO</h2><ol>"; 
  $orderId = filter_input(INPUT_GET, 'order_id', FILTER_SANITIZE_URL);
  $customerId = 0;
  foreach($db->query("SELECT * FROM i_user_payments where order_key='$orderId'") as $row) {
    echo "<li>" . $row['payer_iuid_fk'] . "</li>";
    $customerId = $row['payer_iuid_fk'];
  }
  echo "</ol>";
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

echo filter_input(INPUT_GET, 'productID', FILTER_SANITIZE_URL);
echo filter_input(INPUT_GET, 'order_id', FILTER_SANITIZE_URL);
echo filter_input(INPUT_GET, 'order_id', FILTER_SANITIZE_URL);
?>

<script id="boxcoin" src="https://www.amberance.com/boxcoin/js/client.js"></script>


<div data-boxcoin="custom-<?php echo filter_input(INPUT_GET, 'order_id', FILTER_SANITIZE_URL) ?>-<?php echo $customerId ?>" 
data-price="<?php echo $price ?>"
data-external-reference="<?php echo filter_input(INPUT_GET, 'order_id', FILTER_SANITIZE_URL) ?>-<?php echo $customerId ?>-<?php echo filter_input(INPUT_GET, 'payer_email', FILTER_SANITIZE_URL) ?>"
data-title="<?php echo filter_input(INPUT_GET, 'item_id', FILTER_SANITIZE_URL) ?>"
data-description="<?php echo filter_input(INPUT_GET, 'payer_email', FILTER_SANITIZE_URL) ?>"


></div>


