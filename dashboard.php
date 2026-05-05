<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css?v=1">
</head>
<body>

<div class="navbar">
    <div class="menu">
        <a class="active" href="dashboard.php">Dashboard</a>
        <a href="products.php">Products</a>
        <a href="users.php">Users</a>
        <a href="posts.php">Posts</a>
    </div>

    <div>
        <a href="logout.php" class="logout">Logout</a>
    </div>
</div>

<div class="welcome">
    Welcome, <strong><?php echo $username; ?></strong>
</div>

<div class="container">

    <div class="card">
        <a class="btn" href="products.php">View Products</a>
    </div>

    <div class="card">
        <a class="btn" href="users.php">View Users</a>
    </div>

    <div class="card">
        <a class="btn" href="carts.php">View Carts</a>
    </div>

    <div class="card">
        <a class="btn" href="posts.php">View Posts</a>
    </div>

</div>

</body>
</html>