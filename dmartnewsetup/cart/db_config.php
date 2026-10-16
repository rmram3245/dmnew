<?php
// db_config.php

// Database connection parameters
$servername = "gateway01.ap-northeast-1.prod.aws.tidbcloud.com";
$username = "RC3PaUwsz1fMq9a.root";
$password = "GkvYTuCvdumYM9JQ";
$dbname = "dreadyst_dmart";

try {
    // Establishing connection to the database
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
