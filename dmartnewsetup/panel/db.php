<?php
// db.php
$host = "localhost";
$user = "dgroworg_dmart";
$pass = "aditya@12.A";
$dbname = "dgroworg_dmart"; // change to your DB name

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("DB Connection failed: " . $conn->connect_error);
}
?>