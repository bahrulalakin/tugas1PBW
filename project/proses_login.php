<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Cari user berdasarkan username
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Cek apakah user ada dan password cocok (disini menggunakan teks biasa sesuai contoh insert di atas)
if ($user && $password === $user['password']) {
    $_SESSION['status'] = 'login';
    $_SESSION['username'] = $user['username'];
    header("Location: index.php");
} else {
    header("Location: login.php?message=Username atau password salah!");
}
?>