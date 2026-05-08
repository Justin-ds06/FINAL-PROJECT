<?php
$userId = isset($_GET['user_id']) ? intval($_GET['user_id']) : null;

if (!$userId) {
    die("No user selected");
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://dummyjson.com/carts");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);

if (!isset($data['carts'])) {
    die("Invalid API response");
}
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

<?php foreach ($data['carts'] as $cart): ?>

    <div class="cart-item-block">

        <h3>Cart ID: <?php echo $cart['id']; ?></h3>
        <p>User ID: <?php echo $cart['userId']; ?></p>
        <p>Total Products: <?php echo $cart['totalProducts']; ?></p>
        <p>Total: $<?php echo $cart['total']; ?></p>

        <strong>Products:</strong><br><br>

        <?php foreach ($cart['products'] as $product): ?>
            <div class="cart-item">
                <?php echo htmlspecialchars($product['title']); ?>
                | Qty: <?php echo $product['quantity']; ?>
                | Price: $<?php echo $product['price']; ?>
            </div>
        <?php endforeach; ?>

        <hr>

    </div>

<?php endforeach; ?>

</div>
</body>
</html>