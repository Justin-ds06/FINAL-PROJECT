<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Fetch posts from API
$response = file_get_contents("https://dummyjson.com/posts");
$data = json_decode($response, true);
$posts = $data['posts'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
        }

        
        .navbar {
            display: flex;
            justify-content: space-between;
            padding: 15px 40px;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
        }

        .menu a {
            margin-right: 20px;
            text-decoration: none;
            color: white;
            font-weight: bold;
        }

        .menu a:hover {
            color: #ffd700;
        }

        .logout {
            background: #ff4b5c;
            padding: 8px 15px;
            border-radius: 20px;
            text-decoration: none;
            color: white;
        }

        .logout:hover {
            background: #ff1e38;
        }

       
        h2 {
            text-align: center;
            margin: 40px 0;
            font-size: 32px;
        }

        
        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
        }

       
        .post-card {
            width: 300px;
            background: rgba(255,255,255,0.12);
            padding: 20px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            transition: 0.3s ease;
        }

        .post-card:hover {
            transform: translateY(-5px);
        }

        .post-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .post-body {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 10px;
        }

        .tags {
            margin: 10px 0;
        }

        .tag {
            display: inline-block;
            background: #00c6ff;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            margin: 2px;
        }

        .reactions {
            margin-top: 10px;
            font-size: 14px;
            color: #ffd700;
        }
    </style>
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

<h2>Posts</h2>

<div class="container">

<?php foreach ($posts as $post): ?>

    <div class="post-card">

        <div class="post-title">
            <?= htmlspecialchars($post['title']) ?>
        </div>

        <div class="post-body">
            <?= substr(htmlspecialchars($post['body']), 0, 100) ?>...
        </div>

        <div class="tags">
            <?php foreach ($post['tags'] as $tag): ?>
                <span class="tag"><?= $tag ?></span>
            <?php endforeach; ?>
        </div>

        <div class="reactions">
            ❤️ <?= $post['reactions']['likes'] ?> Likes
        </div>

    </div>

<?php endforeach; ?>

</div>

</body>
</html>