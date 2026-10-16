<?php
// db.php
$host = "gateway01.ap-northeast-1.prod.aws.tidbcloud.com";
$user = "RC3PaUwsz1fMq9a.root";
$pass = "GkvYTuCvdumYM9JQ";
$dbname = "dreadyst_dmartt"; // change to your DB name

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("DB Connection failed: " . $conn->connect_error);
}
?>
