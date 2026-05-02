<?php
session_start();

$conn = new mysqli("localhost", "root", "", "user_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['register'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $_SESSION['register_error'] = "Passwords do not match";
        header("Location: register.php");
        exit();
    }

    $check_email = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($check_email && $check_email->num_rows > 0) {
        $_SESSION['register_error'] = "Email already exists";
        header("Location: register.php");
        exit();
    }

    $check_username = $conn->query("SELECT * FROM users WHERE username='$username'");
    if ($check_username && $check_username->num_rows > 0) {
        $_SESSION['register_error'] = "Username already exists";
        header("Location: register.php");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $conn->query("INSERT INTO users (firstname, lastname, username, email, password)
                  VALUES ('$firstname', '$lastname', '$username', '$email', '$hashedPassword')");

    header("Location: login.php");
    exit();
}
?>