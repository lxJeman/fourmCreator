<?php
require($_SERVER["DOCUMENT_ROOT"] . "/styles/layout/global.php");

// Fetch available forums
$query = "SELECT id, title FROM forums";
$result = $db->query($query);
$forums = [];
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $forums[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Topic</title>
    <link rel="stylesheet" href="<?php echo $paths["styles"] . "/card2.css"; ?>">
    <link rel="stylesheet" href="<?php echo $paths["styles"] . "/input2.css"; ?>">
    <link rel="stylesheet" href="<?php echo $paths["styles"] . "/btn.css"; ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
</head>
<body>
    <div class="parent">
        <div class="card">
            <form id="topic-form" action="<?php echo $paths["scriptsServer"]; ?>/create/topics.php" method="POST">
                <h3 class="card__body" style="text-align: center;">Create New Topic</h3>

                <label for="forum" class="card__body">Select Forum:</label>
                <select id="forum" name="forum_id" class="card__body input-style" required>
                    <option value="">Choose a forum...</option>
                    <?php foreach ($forums as $forum): ?>
                        <option value="<?php echo $forum['id']; ?>"><?php echo htmlspecialchars($forum['title']); ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="title" class="card__body">Topic Title:</label>
                <input placeholder="Your topic title" class="card__body input-style" type="text" id="title" name="title" required>

                <label for="description" class="card__body">Topic Description:</label>
                <textarea id="description" name="description"></textarea>

                <div class="btn-container">
                    <button type="submit">Create Topic</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Initialize SimpleMDE for Markdown
        var simplemde = new SimpleMDE({ 
            element: document.getElementById("description"),
            spellChecker: false,
            toolbar: ["bold", "italic", "heading", "|", "quote", "code", "unordered-list", "ordered-list", "|", "link", "image", "|", "preview"]
        });

        document.getElementById("topic-form").addEventListener("submit", function (e) {
            const value = simplemde.value().trim();
            if (!value) {
                alert("Please fill out the topic description.");
                e.preventDefault(); // stop form from submitting
                return;
            }
            document.getElementById("description").value = value;
        });
        
    
    </script>
</body>
</html>