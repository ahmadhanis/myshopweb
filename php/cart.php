<?php
session_start();
include_once("dbconnect.php");
$session = $_SESSION["session_id"];

$sqlloadcart = "SELECT * FROM tbl_carts INNER JOIN tbl_products ON tbl_carts.prid = tbl_products.prid WHERE tbl_carts.sessionid = '$session'";

$stmt = $conn->prepare($sqlloadcart);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <div class="header">
        <a href="#default" class="logo">MyShop</a>
        <div class="header-right">
            <a class="active" href="../index.php">Home</a>
            <a href="cart.php">My Cart</a>
            <a href="#purchase">My Purcase</a>
            <a href="#contact">Contact</a>

        </div>
    </div>
    <?php
    echo "<div class='card-row'>";
    foreach ($rows as $carts) {
         $imgurl = "../images/" . $carts['picture'];
        echo " <div class='card'>";
        echo "<img src='$imgurl' class='primage'>";
        echo "<h4 align='center' >" . ($carts['prname']) . "</h3>";
        echo "<p align='center'> RM " . number_format($carts['prprice'], 2) . "<br>";
        echo "</div>";
    }
    echo "</div>";
    ?>
</body>

</html>