<?php
session_start();
include_once("php/dbconnect.php");
if (!isset($_COOKIE['email'])) {
    echo "<script>loadCookies()</script>";
} else {
    $email = $_COOKIE['email'];
    //add to cart button
    if (isset($_GET['op'])) {
        $prodid = $_GET['prodid'];
        $sqlcheckstock = "SELECT * FROM tbl_products WHERE prid = '$prodid' "; //check product in stock
        $stmt = $conn->prepare($sqlcheckstock);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $stmt->fetchAll();
        foreach ($rows as $product) {
            $quantity = $product['prqty']; //check qty  in stock?
            if ($quantity == 0) {
                echo "<script>alert('Quantity not available');</script>";
                echo "<script> window.location.replace('index.php')</script>";
            } else {
                //continue insert to cart
                $sqlcheckcart = "SELECT * FROM tbl_carts WHERE prid = '$prodid' AND email = '$email'";
                $stmt = $conn->prepare($sqlcheckcart);
                $stmt->execute();
                $number_of_result = $stmt->rowCount();
                if ($number_of_result == 0) { //insert cart if not in the cart
                    $sqladdtocart = "INSERT INTO tbl_carts (email, prid, qty) VALUES ('$email','$prodid','1')";
                    if ($conn->exec($sqladdtocart)) {
                        echo "<script>alert('Success')</script>";
                        echo "<script> window.location.replace('index.php')</script>";
                    } else {
                        echo "<script>alert('Failed')</script>";
                        echo "<script> window.location.replace('index.php')</script>";
                    }
                } else { //update cart if the item already in the cart
                    $sqlupdatecart = "UPDATE tbl_carts SET qty = qty +1 WHERE prid = '$prodid' AND email = '$email'";
                    if ($conn->exec($sqlupdatecart)) {
                        echo "<script>alert('Success')</script>";
                        echo "<script> window.location.replace('index.php')</script>";
                    } else {
                        echo "<script>alert('Failed')</script>";
                        echo "<script> window.location.replace('index.php')</script>";
                    }
                }
            }
        }
    }
}

//search and list products
if (isset($_GET['button'])) {
    $prname = $_GET['prname'];
    $prtype = $_GET['prtype'];
    if ($prtype == "all") {
        $sqlsearch = "SELECT * FROM tbl_products WHERE prname LIKE '%$prname%'";
    } else {
        $sqlsearch = "SELECT * FROM tbl_products WHERE prtype = '$prtype' AND prname LIKE '%$prname%'";
    }
} else {
    $sqlsearch = "SELECT * FROM tbl_products";
}
$stmt = $conn->prepare($sqlsearch);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>MyShop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src='js/myscript.js'></script>
</head>

<body onload="loadCookies()">
    <div class="header">
        <a href="#default" class="logo">MyShop</a>
        <div class="header-right">
            <a class="active" href="index.php">Home</a>
            <a href="php/cart.php">My Cart</a>
            <a href="#purchase">My Purcase</a>
            <a href="#contact">Contact</a>

        </div>
    </div>
    <h2>List of Products</h2>
    <div class="container-src">
        <form action="index.php" method="get">
            <div class="row">
                <div class="column">
                    <input type="text" id="fprname" name="prname" placeholder="Product name..">
                </div>
                <div class="column">
                    <select id="idprtype" name="prtype">
                        <option value="all">All</option>
                        <option value="beverage">Beverage</option>
                        <option value="canned">Canned Food</option>
                        <option value="electronic">Electronics</option>
                        <option value="furniture">Furniture</option>
                    </select>
                </div>
                <div class="column">
                    <input type="submit" name="button" value="Search">
                </div>
            </div>
        </form>
    </div>
    <?php
    echo "<div class='card-row'>";
    foreach ($rows as $products) {
        $prodid = $products['prid'];
        $qty = $products['prqty'];
        echo " <div class='card'>";
        $imgurl = "images/" . $products['picture'];
        echo "<img src='$imgurl' class='primage'>";
        echo "<h4 align='center' >" . ($products['prname']) . "</h3>";
        echo "<p align='center'> RM " . number_format($products['prprice'], 2) . "<br>";
        echo "Avail:" . ($products['prqty']) . " unit/s</p>";
        echo "<a href='index.php?op=cart&prodid=$prodid'><i class='fas fa-cart-plus'  onclick='return cartDialog()' style='font-size:24px;color:dodgerblue'></i></a>";
        echo "</div>";
    }
    echo "</div>";
    ?>
    <a href="php/newproduct.php" class="float">
        <i class="fa fa-plus my-float"></i>
    </a>
</body>

</html>