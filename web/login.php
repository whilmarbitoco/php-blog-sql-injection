<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // INTENTIONAL VULNERABILITY: SQL Injection
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid credentials";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login — Mini DVWA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="auth-wrap">
        <h2>🔐 Mini DVWA</h2>
        <?php if (!empty($error)): ?>
            <div class="alert alert-error"><?= $error ?></div>
        <?php endif; ?>
        <div class="card">
            <form method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
