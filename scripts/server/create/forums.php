<?php
require($_SERVER["DOCUMENT_ROOT"] . "/styles/layout/global.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    
    try {
        $query = "INSERT INTO forums (title, description) VALUES (:title, :description)";
        $stmt = $db->prepare($query);
        
        $stmt->bindValue(':title', $title, SQLITE3_TEXT);
        $stmt->bindValue(':description', $description, SQLITE3_TEXT);
        
        $result = $stmt->execute();

        if ($result) {
            header("Location: " . $paths["pages"] . "/dashboard.php");
            exit();
        } else {
            throw new Exception($db->lastErrorMsg());
        }
    } catch (Exception $e) {
        $_SESSION["error"] = "Error creating forum: " . $e->getMessage();
        header("Location: " . $paths["pages"] . "/creation/forums.php");
        exit();
    }
}
?>