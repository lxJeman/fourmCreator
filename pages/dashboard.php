<?php
require($_SERVER["DOCUMENT_ROOT"] . "/styles/layout/global.php");
echo "<h1>Welcome to the Dashboard, " . htmlspecialchars($_SESSION["username"]) . "!</h1>";

?>