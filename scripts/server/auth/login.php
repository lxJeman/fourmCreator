<?php
session_start(); // Start the session at the beginning of the file

$paths = require($_SERVER["DOCUMENT_ROOT"] . "/scripts/api/paths.php");
$db = new SQLite3($paths["database"] . "/users.db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    try {
        $query = "SELECT * FROM users WHERE username = :username OR email = :email";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':username', $username, SQLITE3_TEXT);
        $stmt->bindValue(':email', $email, SQLITE3_TEXT);
        $result = $stmt->execute();
        
        if ($result) {
            if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                if (password_verify($password, $row["password"])) {
                    // Set session variables
                    $_SESSION["user_id"] = $row["id"];
                    $_SESSION["username"] = $row["username"];
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["logged_in"] = true;
                    
                    header("Location: " . $paths["pages"] . "/dashboard.php");
                    exit();
                } else {
                    $_SESSION["error"] = "Invalid password.";
                    header("Location: " . $paths["pages"] . "/auth/login.php");
                    exit();
                }
            } else {
                $_SESSION["error"] = "No user found with that username or email.";
                header("Location: " . $paths["pages"] . "/auth/login.php");
                exit();
            }
        } else {
            throw new Exception($db->lastErrorMsg());
        }
    } catch (Exception $e) {
        $_SESSION["error"] = "Error: " . $e->getMessage();
        header("Location: " . $paths["pages"] . "/auth/login.php");
        exit();
    }
}
?>