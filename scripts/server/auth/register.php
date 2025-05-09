<?php
$paths = require($_SERVER["DOCUMENT_ROOT"] . "/scripts/api/paths.php");
$db = new SQLite3($paths["database"] . "/users.db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash password for security

    try {
        $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $db->prepare($query);
        
        $stmt->bindValue(':username', $username, SQLITE3_TEXT);
        $stmt->bindValue(':email', $email, SQLITE3_TEXT);
        $stmt->bindValue(':password', $password, SQLITE3_TEXT);
        
        $result = $stmt->execute();

        if ($result) {
            header("Location: " . $paths["pages"] . "/auth/login.php");
            exit();
        } else {
            throw new Exception($db->lastErrorMsg());
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>