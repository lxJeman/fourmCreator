<?php
session_start();
session_destroy();
header("Location: " . $paths["pages"] . "/auth/login.php");
exit();
?>