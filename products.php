<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$url = "https://dummyjson.com/products";
$response = file_get_contents($url);

$data = json_decode($response, true);
$products = $data['products'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="products.css">
</head>
<body>
    <div class="navbar">
    <div class="menu">
        <a href="dashboard.php">Dashboard</a>
        <a href="products.php">Products</a>
        <a href="users.php">Users</a>
        <a href="posts.php">Posts</a>
    </div>
    <div>
        <a href="logout.php" class="logout">Logout</a>
    </div>
</div>

<h2>Products</h2>

<div class="container">
    <?php foreach ($products as $product): ?>
        <div class="card">
            <img src="<?php echo htmlspecialchars($product['thumbnail']); ?>" 
     alt="<?php echo htmlspecialchars($product['title']); ?>" 
     loading="lazy">
            <div class="title">
                <?php echo htmlspecialchars($product['title']); ?>
            </div>
            <div class="info">
                Category: <?php echo htmlspecialchars($product['category']); ?>
            </div>
            <div class="info price">
                Price: $<?php echo $product['price']; ?>
            </div>
            <div class="info stock">
                Stock: <?php echo $product['stock']; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>