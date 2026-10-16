<?php
require 'check_session.php';
require 'db.php';

header('Content-Type: application/json');

$sql = "SELECT id, name, description, regular_price, final_price, discount_percent, image_url, rating, ratings_count FROM products ORDER BY id DESC";
$result = $conn->query($sql);

$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

echo json_encode($products);
$conn->close();
