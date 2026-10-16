<?php
// db_config.php

// Database connection parameters
$servername = "localhost";
$username = "dgroworg_dmart";
$password = "aditya@12.A";
$dbname = "dgroworg_dmart";

try {
    // Establishing connection to the database
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>