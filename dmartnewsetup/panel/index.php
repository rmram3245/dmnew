<?php
session_start();

// If logged in → go to orders.php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: orders.php");
    exit;
}

// If not logged in → go to login.php
header("Location: login.php");
exit;
