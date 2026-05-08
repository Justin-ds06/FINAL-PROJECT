<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calacal — Home</title>
    <link rel="stylesheet" href="css\index.css">
</head>
<body>
<div class="container">

    <div class="form-box">
        <a href="index.php" class="home-text">
            <img src="img\logo.png" alt="Calacal Logo">
        </a>
        <h2>Welcome to Calacal!</h2>
        <h3>Find joy in every cart.</h3>
        <a href="login.php"><button>Login</button></a>
        <p>
            Don't have an account? <a href="register.php" onclick="showForm('register-form')">Register</a>        
        </p>

    </div>
</div>
</body>

</html>
