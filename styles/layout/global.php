<?php
session_start();
$paths = require($_SERVER["DOCUMENT_ROOT"] . "/scripts/api/paths.php");

// Database connection
$db = new SQLite3($paths["database"] . "/users.db");
if (!$db) {
    echo "Error: " . $db->lastErrorMsg();
    exit;
}

// Session check
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: " . $paths["pages"] . "/auth/login.php");
    exit();
}

// Make commonly used session data easily available
$user = [
    "id" => $_SESSION["user_id"],
    "username" => $_SESSION["username"],
    "email" => $_SESSION["email"]
];

// Database connection and user data now available to all pages that include global.php
?>