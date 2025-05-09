<?php
$paths = require($_SERVER["DOCUMENT_ROOT"] . "/scripts/api/paths.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - A new Account</title>
    <link rel="stylesheet" href="<?php echo $paths["styles"] . "/card.css"; ?>">
    <link rel="stylesheet" href="<?php echo $paths["styles"] . "/input.css"; ?>">
    <link rel="stylesheet" href="<?php echo $paths["styles"] . "/global.css"; ?>">
</head>
<body>
    <div class="card">
        <form action="<?php echo $paths["scriptsServer"] . "/auth/login.php"; ?>" method="POST">
            <div class="card__body"> <br>

                <p class="card__title">Log in a account</p>
                <p class="card__paragraph">Log in a account to access all the website features</p>

                <div class="card_body">
                    <label for="username" class="text">Username</label>
                    <input class="input" placeholder="coolusername123" name="username" id="username" type="text" required>
                    <br><br><br>

                    <label for="email" class="text">Email</label>
                    <input class="input" placeholder="coolusername123@gmail.com" name="email" id="email" type="email" required>
                    <br><br><br>

                    <label for="password" class="text">Password</label>
                    <input class="input" placeholder="********" name="password" id="password" type="password" required>
                    <br><br><br>

                    <p class="card__paragraph">Forgot Password <a href="<?php echo "Feature isn't avalible in free version link to paid version - www.linkaddlater.com"?>">Login then!</a></p>
                    <p class="card__paragraph">Don't have an account? <a href="<?php echo $paths["pages"] . "/auth/register.php"; ?>">Register here!</a></p>

                </div>
            </div>

            <div class="card__ribbon">
                <button type="submit" style="background: none; border: none; cursor: pointer;">
                    <label class="card__ribbon-label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </label>
                </button>
            </div>
        </form>
    </div>
</body>
</html>