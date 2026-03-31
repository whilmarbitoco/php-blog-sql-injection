<?php
$conn = null;
$attempts = 0;

while ($attempts < 10) {
    try {
        $conn = new mysqli("db", "root", "root", "blogdb");
        break;
    } catch (Exception $e) {
        $attempts++;
        sleep(2);
    }
}

if (!$conn || $conn->connect_error) {
    die("Connection failed after retries.");
}
?>
