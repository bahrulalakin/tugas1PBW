<?php
include 'koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];

// Cari data buku berdasarkan ID untuk mengisi form
$stmt = $conn->prepare("SELECT * FROM buku WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    die("Data tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
</head>
<body>
    <h2>Edit Data Buku</h2>
    <form action="proses_edit.php" method="POST">
        <!-- Input hidden untuk mengirim ID ke proses_edit.php -->
        <input type="hidden" name="id" value="<?= $data['id']; ?>">

        <label>Judul Buku:</label><br>
        <input type="text" name="judul" value="<?= $data['judul']; ?>" required><br><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" value="<?= $data['harga']; ?>" required><br><br>

        <button type="submit" name="submit">Update Data</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>