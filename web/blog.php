<?php
include 'db.php';

// INTENTIONAL VULNERABILITY: SQL Injection via blog_id
$id = $_GET['blog_id'];
$query = "SELECT * FROM blogs WHERE id = '$id'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $row['title'] ?> — Mini DVWA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <a class="brand" href="index.php">⚠ Mini DVWA</a>
    </nav>
    <div class="container">
        <a class="back" href="index.php">&larr; Back to posts</a>
        <h1><?= $row['title'] ?></h1>
        <?php if ($row['image']): ?>
            <img class="post-image" src="uploads/<?= $row['image'] ?>" alt="blog image">
        <?php endif; ?>
        <p class="post-body"><?= $row['body'] ?></p>
    </div>
</body>
</html>
