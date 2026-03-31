<?php
include 'db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Blog — Mini DVWA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <a class="brand" href="index.php">⚠ Mini DVWA</a>
        <div class="nav-links">
            <?php if (isset($_SESSION['user'])): ?>
                <a href="dashboard.php">New Post</a>
                <a href="upload.php">Upload</a>
                <span style="color:#555;margin-left:20px;font-size:0.9rem"><?= $_SESSION['user'] ?></span>
            <?php else: ?>
                <a href="login.php">Login</a>
            <?php endif; ?>
        </div>
    </nav>
    <div class="container">
        <h2>All Posts</h2>
        <?php
        $result = $conn->query("SELECT * FROM blogs");
        while ($row = $result->fetch_assoc()):
        ?>
            <div class="card">
                <h3><a href="blog.php?blog_id=<?= $row['id'] ?>"><?= $row['title'] ?></a></h3>
                <p><?= substr($row['body'], 0, 120) ?>...</p>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
