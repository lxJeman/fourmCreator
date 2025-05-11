<?php
require($_SERVER["DOCUMENT_ROOT"] . "/styles/layout/global.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $forum_id = $_POST["forum_id"];
    $user_id = $_SESSION["user_id"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    
    try {
        $query = "INSERT INTO topics (forum_id, user_id, title, description) VALUES (:forum_id, :user_id, :title, :description)";
        $stmt = $db->prepare($query);
        
        $stmt->bindValue(':forum_id', $forum_id, SQLITE3_INTEGER);
        $stmt->bindValue(':user_id', $user_id, SQLITE3_INTEGER);
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
        $_SESSION["error"] = "Error creating topic: " . $e->getMessage();
        header("Location: " . $paths["pages"] . "/creation/topics.php");
        exit();
    }
}
?>