<?php
require 'check_session.php';

$file = __DIR__ . "/../cart/dmart.apk";

if (file_exists($file)) {
    if (unlink($file)) {
        echo json_encode(["success"=>true]);
    } else {
        echo json_encode(["success"=>false,"message"=>"Cannot delete file"]);
    }
} else {
    echo json_encode(["success"=>false,"message"=>"File not found"]);
}
