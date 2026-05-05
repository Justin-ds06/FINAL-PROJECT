<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$userResponse = @file_get_contents("https://dummyjson.com/users");

if ($userResponse === false) {
    die("Failed to fetch users.");
}

$userData = json_decode($userResponse, true);

if (!isset($userData['users'])) {
    die("Invalid users API response.");
}

$users = $userData['users'];

$selectedUserId = isset($_GET['user_id']) ? intval($_GET['user_id']) : null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <link rel="stylesheet" href="users.css">
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

<div class="container">
    <h2>User List</h2>

    <?php foreach ($users as $user): ?>
        <div class="user-card">
            <div class="image-wrapper">
                <img src="<?php echo htmlspecialchars($user['image']); ?>" 
                     alt="<?php echo htmlspecialchars($user['firstName']); ?>"
                     onerror="this.src='https://via.placeholder.com/150';">
            </div>

            <strong>
                <?php echo htmlspecialchars($user['firstName'] . " " . $user['lastName']); ?>
            </strong><br>

            Email: <?php echo htmlspecialchars($user['email']); ?><br>
            Age: <?php echo htmlspecialchars($user['age']); ?><br>
            Phone: <?php echo htmlspecialchars($user['phone']); ?><br><br>

            <a class="btn" href="users.php?user_id=<?php echo $user['id']; ?>">
                View Cart
            </a>
        </div>
    <?php endforeach; ?>
</div>

<?php
if ($selectedUserId) {

    $cartResponse = @file_get_contents("https://dummyjson.com/carts");
    $cartData = json_decode($cartResponse, true);

    if (isset($cartData['carts'])) {
        foreach ($cartData['carts'] as $cart) {
            if ($cart['userId'] == $selectedUserId) {
?>

<div class="cart-box">
    <h3>Cart ID: <?php echo $cart['id']; ?></h3>
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
    }
}
?>

</body>
</html>