<?php
session_start();

$conn = new mysqli("localhost", "root", "", "user_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {

    $login_input = $_POST['login_input'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$login_input' OR username='$login_input'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

            $_SESSION['email'] = $user['email'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['name'] = $user['firstname'] . " " . $user['lastname'];

            
            $_SESSION['alert'] = [
                'type' => 'success',
                'message' => 'Welcome back ' . $user['username'] . '!'
            ];

            header("Location: dashboard.php");
            exit();

        } else {

        
            $_SESSION['alert'] = [
                'type' => 'error',
                'message' => 'Incorrect password!'
            ];

            header("Location: login.php");
            exit();
        }

    } else {

    
        $_SESSION['alert'] = [
            'type' => 'error',
            'message' => 'Username or Email not found!'
        ];

        header("Location: login.php");
        exit();
    }
}
?>