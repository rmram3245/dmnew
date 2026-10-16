<?php
require 'check_session.php';
require 'db.php';

header('Content-Type: application/json');

$sql = "SELECT *
        FROM form_data
        ORDER BY id DESC";

$result = $conn->query($sql);

$orders = [];
while ($row = $result->fetch_assoc()) {
    $orders[] = $row;
}

echo json_encode($orders);
$conn->close();
