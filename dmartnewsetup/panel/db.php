<?php
// db.php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$pass = getenv('DB_PASSWORD');
$dbname = getenv('DB_NAME');
$port = getenv('DB_PORT') ?: '4000';

// Download the CA certificate from TiDB Cloud
$ca = __DIR__ . '/tidb-ca.pem';

try {
    $conn = mysqli_init();

    mysqli_options(
        $conn,
        MYSQLI_OPT_SSL_VERIFY_SERVER_CERT,
        true
    );

    mysqli_ssl_set(
        $conn,
        null,
        null,
        $ca,
        null,
        null
    );

    mysqli_real_connect(
        $conn,
        $host,
        $user,
        $pass,
        $dbname,
        $port,
        null,
        MYSQLI_CLIENT_SSL
    );

    $conn->set_charset('utf8mb4');

} catch (Throwable $e) {
    error_log('Database connection failed: ' . $e->getMessage());
    http_response_code(500);
    exit('Database connection failed. Please try again later.');
}
?>
