<?php 
session_start();

$alert = null;

if (isset($_SESSION['alert'])) {
    $alert = $_SESSION['alert'];
    unset($_SESSION['alert']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>


<?php if ($alert): ?>
    <div class="alert <?= $alert['type'] ?>">
        <?= $alert['message'] ?>
    </div>
<?php endif; ?>

<div class="container">

    <div class="form-box">

        <h2>Login</h2>

        <form method="POST" action="login_process.php">

            <input type="text" name="login_input" placeholder="Username or Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>

        </form>

        <p>Don't have an account yet? <a href="register.php" class="bottom-link">Create account</a></p>

    </div>

    <a class="back-home" href="index.php">← Back to Home</a>

</div>


</body>
</html>
