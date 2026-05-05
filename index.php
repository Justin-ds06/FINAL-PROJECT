<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

.home-text {
    position: absolute;
    top: 20px;
    left: 30px;
    text-decoration: none;
    color: white;
    font-weight: bold;
    transition: 0.3s ease;
}

.home-text:hover {
    color: #00c6ff;
}


.container {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* GLASS FORM BOX */
.form-box {
    width: 320px;
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

.form-box button {
    width: 100%;
    margin: 10px 0;
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
    </style>
</head>
<body>
     
<a href="index.php" class="home-text">Home</a>

<div class="container">
    <div class="form-box">
        <h2>Welcome</h2>
        <a href="login.php"><button>Login</button></a>
        <a href="register.php"><button>Register</button></a>

    </div>

</div>
</body>
</html>