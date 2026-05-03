<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ?");
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

if ($user && $password === $user['password']) {
    $_SESSION['status'] = 'login';
    $_SESSION['username'] = $user['username'];
    header("Location: index.php");
} else {
    header("Location: login.php?message=Username atau Password salah!");
}
exit();
?>