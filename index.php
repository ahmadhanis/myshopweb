<?php
include_once("php/dbconnect.php");

$sqlall = "SELECT * FROM tbl_products";
$stmt = $conn->prepare($sqlall);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll();
$email = "visitor";
if (isset($_GET['op'])){
    if($_GET['op']=="visitor"){
        //ask to login or register
    }
    
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <div class="header">
        <a href="#default" class="logo">MyShop</a>
        <div class="header-right">
            <a class="active" href="#home">Home</a>
            <a href="#cart">My Cart</a>
            <a href="#purchase">My Purcase</a>
            <a href="#contact">Contact</a>

        </div>
    </div>
    <div class="container-src">
        <form action="newproduct.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="column">
                    <input type="text" id="fprname" name="prname" placeholder="Product name..">
                </div>
                <div class="column">
                    <select id="idprtype" name="prtype">
                        <option value="all">All</option>
                        <option value="electronic">Electronics</option>
                        <option value="beverage">Beverage</option>
                        <option value="canned">Canned Food</option>
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
        echo " <div class='card'>";
        $imgurl = "images/" . $products['picture'];
        echo "<img src='$imgurl' class='primage'>";
        echo "<h4 align='center' >" . ($products['prname']) . "</h3>";
        echo "<p align='center'> RM " . number_format($products['prprice'], 2) . "<br>";
        echo "Avail:" . ($products['prqty']) . " unit/s</p>";
        echo "<a href='index.php?op=cart&email=$email&prodid=$prodid'><i class='fas fa-cart-plus' style='font-size:24px;color:dodgerblue'></i></a>";

        echo "</div>";
    }
    echo "</div>";
    ?>
    <a href="php/newproduct.php" class="float">
        <i class="fa fa-plus my-float"></i>
    </a>
</body>

</html>