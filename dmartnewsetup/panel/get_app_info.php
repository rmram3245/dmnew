<?php
require 'check_session.php';

// Set timezone to IST
date_default_timezone_set("Asia/Kolkata");

// go two folders up, then into cart/
$file = __DIR__ . "/../cart/dmart.apk";
$response = ["exists"=>false];

if (file_exists($file)) {
    $response["exists"] = true;
    $response["name"] = basename($file);
    $response["size"] = round(filesize($file)/1048576,2)." MB";
    $response["uploaded_date"] = date("M d, Y h:i A", filemtime($file));
}

header("Content-Type: application/json");
echo json_encode($response);
