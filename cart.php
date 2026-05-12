<?php
$cartResponse = @file_get_contents("https://dummyjson.com/carts");
$cartData = json_decode($cartResponse, true);

if (isset($cartData['carts'])) {
    foreach ($cartData['carts'] as $cart) {
?>
<!DOCTYPE html>
<html>
<head>
    <title>All Carts</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
<div class="navbar">
    <div class="menu">
        <a href="dashboard.php">Dashboard</a>
        <a href="products.php">Products</a>
        <a href="users.php">Users</a>
        <a href="posts.php">Posts</a>
    </div>
    <a href="logout.php" class="logout">Logout</a>
</div>

<div class="cart-box">
    <h3>Cart ID: <?php echo $cart['id']; ?></h3>
    User ID: <?php echo $cart['userId']; ?><br>
    Total Products: <?php echo $cart['totalProducts']; ?><br>
    Total Amount: $<?php echo $cart['total']; ?><br><br>

    <strong>Products:</strong><br><br>

    <?php foreach ($cart['products'] as $product): ?>
        <div class="cart-item">
            <?php echo htmlspecialchars($product['title']); ?>
            | Qty: <?php echo $product['quantity']; ?>
            | Price: $<?php echo $product['price']; ?>
            | Total: $<?php echo $product['total']; ?>
        </div>
    <?php endforeach; ?>
</div>

<?php
    }
}
?>
</body>
</html>
