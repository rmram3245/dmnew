<?php
require 'check_session.php';
require 'db.php';

header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data['id'])) {
    $id = intval($data['id']);
    $sql = "DELETE FROM form_data WHERE id=$id";
    if ($conn->query($sql)) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $conn->error]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Invalid data"]);
}
$conn->close();
