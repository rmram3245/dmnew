<?php
require 'check_session.php';

if (!isset($_FILES['app_file'])) {
    echo json_encode(["success"=>false,"message"=>"No file"]);
    exit;
}

$file = $_FILES['app_file'];
$targetDir = __DIR__ . "/../cart/";
$targetFile = $targetDir . "dmart.apk";

if ($file['error'] !== UPLOAD_ERR_OK) {
    echo json_encode(["success"=>false,"message"=>"Upload error"]);
    exit;
}

$ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
if ($ext !== "apk") {
    echo json_encode(["success"=>false,"message"=>"Only APK allowed"]);
    exit;
}

if ($file['size'] > 100*1024*1024) {
    echo json_encode(["success"=>false,"message"=>"File too large"]);
    exit;
}

if (!is_dir($targetDir)) mkdir($targetDir,0777,true);

if (move_uploaded_file($file['tmp_name'], $targetFile)) {
    echo json_encode(["success"=>true]);
} else {
    echo json_encode(["success"=>false,"message"=>"Failed to save file"]);
}
