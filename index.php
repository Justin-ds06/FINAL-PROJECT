<?php
session_start();

$loginError = $_SESSION['login_error'] ?? '';
$registerError = $_SESSION['register_error'] ?? '';
$activeForm = $_SESSION['active_form'] ?? 'login';

unset($_SESSION['login_error']);
unset($_SESSION['register_error']);
unset($_SESSION['active_form']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login/Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-box <?= ($activeForm == 'login') ? 'active' : '' ?>" id="login-form">
    <form action="login_register.php" method="post">
        <h2>LOGIN</h2>

        <?php if ($loginError) { ?>
            <p class="error-message"><?= $loginError ?></p> <?php } ?>

        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>

        <p> Don't have an account? <a href="#" onclick="showForm('register-form')">Register</a></p>
    </form>
</div>

<div class="form-box <?= ($activeForm == 'register') ? 'active' : '' ?>" id="register-form">
    <form action="login_register.php" method="post">
        <h2>REGISTER</h2>

        <?php if ($registerError) { ?>
            <p class="error-message"><?= $registerError ?></p>
        <?php } ?>

        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <select name="role" required>
            <option value="">--Select Role--</option>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>

        <button type="submit" name="register">Register</button>
        <p> Already have an account? <a href="#" onclick="showForm('login-form')">Login</a></p>
    </form>
</div>

<script>
function showForm(formId){
    document.querySelectorAll(".form-box").forEach(f => f.classList.remove("active"));
    document.getElementById(formId).classList.add("active");
}
</script>

</body>
</html>