
<?php
header('Content-Type: text/plain; charset=utf-8');

echo "PHP is running.\n";

try {
    require_once __DIR__ . '/cart/db_config.php';

    echo "Database connection: SUCCESS\n";

    $stmt = $conn->query("SELECT COUNT(*) FROM products");
    $count = $stmt->fetchColumn();

    echo "Products table: SUCCESS\n";
    echo "Product count: " . $count . "\n";

} catch (Throwable $e) {
    error_log('Diagnostic error: ' . $e->getMessage());
    http_response_code(500);
    echo "Test failed. Check Render Logs.\n";
}
?>
