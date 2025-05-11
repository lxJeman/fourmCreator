<?php
require($_SERVER["DOCUMENT_ROOT"] . "/styles/layout/global.php");

$id = $_GET["id"] ?? null;

if ($id === null) {
    header("Location: " . $paths["pages"] . "/errors/nonexistingfourm.php");
    exit();
}

// Query the database
$query = $db->prepare("SELECT * FROM forums WHERE id = :id");
$query->bindValue(':id', $id, SQLITE3_INTEGER);
$result = $query->execute();
$forum = $result->fetchArray(SQLITE3_ASSOC);

// Check if the forum exists
if (!$forum) {
    header("Location: " . $paths["pages"] . "/errors/nonexistingfourm.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($forum['title']); ?></title>
</head>
<body>
    <h1><?php echo htmlspecialchars($forum['title']); ?></h1>
    <p><?php echo nl2br(htmlspecialchars($forum['description'])); ?></p>
</body>
</html>