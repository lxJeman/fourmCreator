<?php
$paths = require($_SERVER["DOCUMENT_ROOT"] . "/scripts/api/paths.php");

$db = new SQLite3($paths["database"] . "/users.db");

$query = "CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$db->exec($query);

if (!$db) {
    echo "Error: " . $db->lastErrorMsg();
    exit;
}
?>