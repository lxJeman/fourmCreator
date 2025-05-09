<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location:" . $_SERVER["DOCUMENT_ROOT"] . "/auth/login.php");
    exit();
}
echo "<h1>Welcome to the Dashboard, " . htmlspecialchars($_SESSION["username"]) . "!</h1>";
// ...rest of dashboard code...
?>