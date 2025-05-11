<?php
require($_SERVER["DOCUMENT_ROOT"] . "/styles/layout/global.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Creator</title>
    <link rel="stylesheet" href="<?php echo $paths["styles"] . "/card2.css"; ?>">
    <link rel="stylesheet" href="<?php echo $paths["styles"] . "/input2.css"; ?>">
    <link rel="stylesheet" href="<?php echo $paths["styles"] . "/btn.css"; ?>">
</head>
<body>
    <div class="parent">
        <div class="card">
            <form action="<?php echo $paths["scriptsServer"]; ?>/create/forums.php" method="POST">
                <h3 class="card__body" style="text-align: center;">Create New Forum</h3>

                <label for="name" class="card__body">Forum Name:</label>
                <input placeholder="PHP forum" class="card__body input-style" type="text" id="name" name="title" required>
                <br><br>

                <label for="description" class="card__body">Forum Description:</label>
                <input placeholder="A forum about PHP" class="card__body input-style" type="text" id="description" name="description" required>
                <br><br>

                <div class="btn-container">
                    <button type="submit">Create Forum</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>