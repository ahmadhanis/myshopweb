<?php
include_once("dbconnect.php");
$email = $_POST['email'];
$prid = $_POST['prid'];

$sqlinsert = "INSERT INTO tbl_carts(email,prid,prqty) VALUES ('$email','$prid','1')";
if ($conn->query($sqlinsert) === TRUE) {
    echo "success";
} else {
    echo "failed";
}

?>