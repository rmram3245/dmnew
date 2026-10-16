
<?php
// cart/db_config.php

$host   = getenv('DB_HOST');
$port   = getenv('DB_PORT') ?: '4000';
$dbname = getenv('DB_NAME');
$user   = getenv('DB_USER');
$pass   = getenv('DB_PASSWORD');

try {
    if (!$host || !$dbname || !$user || $pass === false || $pass === '') {
        throw new RuntimeException('Missing database environment variables.');
    }

    $caFile = '/etc/ssl/certs/ca-certificates.crt';

    if (!is_readable($caFile)) {
        throw new RuntimeException('System CA certificate bundle is unavailable.');
    }

    $dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset=utf8mb4";

    $conn = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_TIMEOUT            => 10,
        PDO::MYSQL_ATTR_SSL_CA       => $caFile,
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => true,
    ]);

} catch (Throwable $e) {
    error_log('TiDB connection error: ' . $e->getMessage());
    http_response_code(500);
    exit('Database connection failed. Please check Render logs.');
}
