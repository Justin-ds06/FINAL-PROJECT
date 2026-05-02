<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>

<div class="container">

    <div class="form-box">

        <h2>Login</h2>

        <?php
        if (isset($_SESSION['login_error'])) {
            echo "<p class='error'>" . $_SESSION['login_error'] . "</p>";
            unset($_SESSION['login_error']);
        }
        ?>


        <form method="POST" action="login_process.php">

            <input type="text" name="login_input" placeholder="Username or Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>

        </form>
    </div>

    
    <a class="back-home" href="index.php">← Back to Home</a>

</div>

    <a href="register.php" class="bottom-left-link">Create account</a>

</body>
</html>