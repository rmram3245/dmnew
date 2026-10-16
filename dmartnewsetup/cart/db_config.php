<?php
// db_config.php

$servername = getenv('DB_HOST');
$username   = getenv('DB_USER');
$password   = getenv('DB_PASSWORD');
$dbname     = getenv('DB_NAME');
$port       = 4000;

// CA certificate file must be deployed with this PHP file.
$caFile = __DIR__ . '/tidb-ca.pem';

try {
    if (!$servername || !$username || $password === false || !$dbname) {
        throw new RuntimeException('Database environment variables are missing.');
    }

    if (!is_file($caFile)) {
        throw new RuntimeException('TiDB CA certificate file is missing.');
    }

    $dsn = "mysql:host={$servername};port={$port};dbname={$dbname};charset=utf8mb4";

    $conn = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_SSL_CA       => $caFile,
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => true,
    ]);

} catch (Throwable $e) {
    error_log('Database connection failed: ' . $e->getMessage());
    http_response_code(500);
    exit('Database connection failed. Please check server configuration.');
}
?>
