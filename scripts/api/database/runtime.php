<?php
$paths = require($_SERVER["DOCUMENT_ROOT"] . "/scripts/api/paths.php");

$db = new SQLite3($paths["database"] . "/users.db");

// Check database connection first
if (!$db) {
    echo "Error: " . $db->lastErrorMsg();
    exit;
}

$query = "CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$query2 = "CREATE TABLE IF NOT EXISTS forums (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT NOT NULL UNIQUE,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)"; // Removed extra comma

$query3 = "CREATE TABLE IF NOT EXISTS topics (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    forum_id INTEGER NOT NULL,
    user_id INTEGER NOT NULL,
    title TEXT NOT NULL,
    description TEXT, -- Added description column
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (forum_id) REFERENCES forums(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

$query4 = "CREATE TABLE IF NOT EXISTS posts (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    topic_id INTEGER NOT NULL,
    user_id INTEGER NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (topic_id) REFERENCES topics(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

// Execute queries and check for errors
try {
    $db->exec('BEGIN');
    $db->exec($query);
    $db->exec($query2);
    $db->exec($query3);
    $db->exec($query4);
    $db->exec('COMMIT');
    echo "Tables created successfully";
} catch (Exception $e) {
    $db->exec('ROLLBACK');
    echo "Error: " . $e->getMessage();
    exit;
}
?>