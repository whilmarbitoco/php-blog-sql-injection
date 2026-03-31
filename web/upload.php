<?php
// INTENTIONAL VULNERABILITY: No file type or size validation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $target = "uploads/" . basename($_FILES["file"]["name"]);

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target)) {
        $message = "File uploaded: <a href='$target'>" . basename($target) . "</a>";
        $success = true;
    } else {
        $message = "Upload failed.";
        $success = false;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload — Mini DVWA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <a class="brand" href="index.php">⚠ Mini DVWA</a>
        <div class="nav-links">
            <a href="index.php">Posts</a>
        </div>
    </nav>
    <div class="container">
        <a class="back" href="index.php">&larr; Back to posts</a>
        <h2>File Upload</h2>
        <?php if (!empty($message)): ?>
            <div class="alert <?= $success ? 'alert-success' : 'alert-error' ?>"><?= $message ?></div>
        <?php endif; ?>
        <div class="card">
            <form method="POST" enctype="multipart/form-data">
                <input type="file" name="file" required>
                <button type="submit">Upload</button>
            </form>
        </div>
    </div>
</body>
</html>
