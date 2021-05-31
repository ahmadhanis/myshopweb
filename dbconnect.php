<?php
$servername = "localhost";
$username = "slumber6_myshopdbadmin";
$password = "pPkg&+(IL6cu";
$dbname = "slumber6_myshopdb";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>