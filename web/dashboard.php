<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $image = $_POST['image'] ?? '';

    $conn->query("INSERT INTO blogs (title, body, image) VALUES ('$title', '$body', '$image')");
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>New Post — Mini DVWA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <a class="brand" href="index.php">⚠ Mini DVWA</a>
        <div class="nav-links">
            <a href="index.php">Posts</a>
            <a href="upload.php">Upload</a>
        </div>
    </nav>
    <div class="container">
        <a class="back" href="index.php">&larr; Back to posts</a>
        <h2>Create Post</h2>
        <div class="card">
            <form method="POST">
                <input type="text" name="title" placeholder="Title" required>
                <textarea name="body" placeholder="Write your post..." required></textarea>
                <input type="text" name="image" placeholder="Image filename (optional)">
                <button type="submit">Publish</button>
            </form>
        </div>
    </div>
</body>
</html>
