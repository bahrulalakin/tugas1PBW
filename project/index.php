<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("Location: login.php?message=Silahkan login terlebih dahulu");
    exit();
}
include 'koneksi.php';
// ... sisa kode index.php kamu ...
?>

<?php
include 'koneksi.php';

// Ambil semua data buku
$query = "SELECT * FROM buku";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
</head>
<body>
    <h2>Daftar Koleksi Buku</h2>
    <a href="tambah.php">[+] Tambah Buku Baru</a>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['judul']; ?></td>
            <td><?= $row['penulis']; ?></td>
            <td><?= number_format($row['harga'], 0, ',', '.'); ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> | 
                <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <p>Halo, <?= $_SESSION['username']; ?>! <a href="logout.php">Logout</a></p>
</body>
</html>

