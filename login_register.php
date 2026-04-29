<?php
session_start();

$conn = new mysqli("localhost", "root", "", "user_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {

        header("Location: user_page.php");
        exit();

    } else {

        $_SESSION['login_error'] = "Incorrect email or password";
        $_SESSION['active_form'] = "login";

        header("Location: index.php");
        exit();
    }
}


if (isset($_POST['register'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $check = $conn->query("SELECT * FROM users WHERE email='$email'");

    if ($check && $check->num_rows > 0) {

        $_SESSION['register_error'] = "Email already exists";
        $_SESSION['active_form'] = "register";

        header("Location: index.php");
        exit();
    }
    $conn->query("INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')");
    $_SESSION['active_form'] = "login";
    header("Location: index.php");
    exit();
}
?>