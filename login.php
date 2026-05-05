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

    <style>
* {
    box-sizing: border-box;
}

body {
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    font-family: Arial, sans-serif;
    color: white;
    margin: 0;
}


.alert {
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    padding: 14px 25px;
    border-radius: 10px;
    font-weight: bold;
    z-index: 9999;
    box-shadow: 0 10px 25px rgba(0,0,0,0.3);
    animation: fadeAlert 3s forwards;
    min-width: 250px;
    text-align: center;
    color: white;
}

.alert.success {
    background: #00c853;
}

.alert.error {
    background: #ff5252;
}

.alert.info {
    background: #2196f3;
}

@keyframes fadeAlert {
    0% { opacity: 0; transform: translateX(-50%) translateY(-20px); }
    10% { opacity: 1; transform: translateX(-50%) translateY(0); }
    80% { opacity: 1; }
    100% { opacity: 0; transform: translateX(-50%) translateY(-20px); }
}


.container {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
}


.form-box {
    width: 340px;
    padding: 30px;
    text-align: center;
    background: rgba(255,255,255,0.12);
    border-radius: 15px;
    backdrop-filter: blur(10px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}

.form-box h2 {
    margin-bottom: 20px;
    font-size: 28px;
}

.form-box input {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border: none;
    border-radius: 10px;
    outline: none;
}

.form-box button {
    width: 100%;
    margin-top: 10px;
    padding: 10px;
    border: none;
    border-radius: 20px;
    background: #00c6ff;
    color: white;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s ease;
}

.form-box button:hover {
    transform: translateY(-3px);
    background: #00a6d6;
}


.back-home{
     position: absolute;
    top: 20px;
    left: 30px;
    color: white;
    text-decoration: none;
    font-weight: bold;
}

.back-home:hover,
.bottom-left-link:hover {
    color: #00c6ff;
}

.bottom-link {
    display: block;
    margin-top: 15px;
    color: white;
    text-decoration: none;
    font-weight: bold;
    transition: 0.3s ease;
    color: #259cbd; 
}

.bottom-link:hover {
    color: #00c6ff;
    letter-spacing: 1px;
}
    </style>
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