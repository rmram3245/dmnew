<?php
ini_set('log_errors', '1');
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

require_once __DIR__ . '/db_config.php';

$product_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$product_id || $product_id < 1) {
    http_response_code(400);
    exit('Invalid product ID.');
}

try {
    $stmt = $conn->prepare(
        "SELECT id, name, description, regular_price, final_price,
                discount_percent, image_url, rating, ratings_count
         FROM products
         WHERE id = :id"
    );

    $stmt->execute(['id' => $product_id]);
    $product = $stmt->fetch();

    if (!$product) {
        http_response_code(404);
        exit('Product not found.');
    }

} catch (Throwable $e) {
    error_log('Product page error: ' . $e->getMessage());
    http_response_code(500);
    exit('Unable to load this product. Please check Render logs.');
}
?>
