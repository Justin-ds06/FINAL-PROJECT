<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<div class="container">

    <div class="form-box">
    <h2>Register</h2>

     <?php
        if (isset($_SESSION['register_error'])) {
            echo "<p class='error'>" . $_SESSION['register_error'] . "</p>";
            unset($_SESSION['register_error']);
        }
        ?>

    <form method="POST" action="register_process.php">

        <input type="text" name="firstname" placeholder="First Name" required>
        <input type="text" name="lastname" placeholder="Last Name" required>
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirm_password" placeholder="Re-enter Password" required>
        <button type="submit" name="register">Register</button>

        </form>
    </div>

    
    <a class="back-home" href="index.php">← Back to Home</a>

</div>

<a href="Login.php" class="bottom-left-link">Login</a>

</body>

</html>