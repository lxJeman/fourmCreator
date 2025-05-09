<?php
$paths = [
    "root" => $_SERVER["DOCUMENT_ROOT"],
    "pages" => "/pages",  // Changed to web-relative path
    "assets" => "/assets",  // Changed to web-relative path
    "scriptsAPI_DATABASE" => __DIR__ . "/database",
    "scriptsAPI" => __DIR__,
    "scriptsClient" => "/scripts/client",  // Changed to web-relative path
    "scriptsServer" => "/scripts/server",  // Changed to web-relative path
    "styles" => "/styles",  // Already web-relative path
    "database" => $_SERVER["DOCUMENT_ROOT"] . "/database",
];

return $paths;
?>