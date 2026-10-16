<?php
require 'check_session.php';
require 'db.php';

header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data['id'])) {
    $id = intval($data['id']);
    $status = $conn->real_escape_string($data['cf_status']);
    $forwarded_to = $conn->real_escape_string($data['forwarded_to']);

    $sql = "UPDATE form_data SET cf_status='$status', forwarded_to='$forwarded_to', updated_at=NOW() WHERE id=$id";
    if ($conn->query($sql)) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $conn->error]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Invalid data"]);
}
$conn->close();
