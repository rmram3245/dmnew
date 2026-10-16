<?php
// functions/fetch_products.php

include '../cart/db_config.php';

try {
    $stmt = $conn->query("SELECT id, name, description, regular_price, final_price, discount_percent, image_url, rating, ratings_count FROM products");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($products);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>