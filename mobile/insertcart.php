<?php
include_once("dbconnect.php");
$email = $_POST['email'];
$prid = $_POST['prid'];

$sqlcheckstock = "SELECT * FROM tbl_products WHERE prid = '$prid' "; //check product in stock
$resultstock = $conn->query($sqlcheckstock);
if ($resultstock->num_rows > 0) {
     while ($row = $resultstock ->fetch_assoc()){
        $quantity = $row['prqty'];
        if ($quantity == 0) { //product is out of stock
            echo "failed"; 
            return;
        } else {
           echo $sqlcheckcart = "SELECT * FROM tbl_carts WHERE prid = '$prid' AND email = '$email'"; //check if the product is already in cart
            $resultcart = $conn->query($sqlcheckcart);
            if ($resultcart->num_rows == 0) {//product is not in the cart proceed with insert new
                 echo $sqladdtocart = "INSERT INTO tbl_carts (email, prid, qty) VALUES ('$email','$prid','1')";
                if ($conn->query($sqladdtocart) === TRUE) {
                    echo "success";
                } else {
                    echo "failed";
                }
            } else { //if the product is in the cart, proceed with update
                echo $sqlupdatecart = "UPDATE tbl_carts SET qty = qty +1 WHERE prid = '$prid' AND email = '$email'";
                if ($conn->query($sqlupdatecart) === TRUE) {
                    echo "success";
                } else {
                    echo "failed";
                }
            }
        }
    }
}else{
    echo "failed";
}

?>