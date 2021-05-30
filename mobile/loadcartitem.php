<?php
include_once("dbconnect.php");
$email = $_POST['email'];

$sqlcart = "SELECT * FROM tbl_carts WHERE email = '$email'";
$result = $conn->query($sqlcart);
echo $num = $result->num_rows

?>