<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
</head>
<body>
    <h2>Tambah Data Buku</h2>
    <form action="proses_tambah.php" method="POST">
        <label>Judul Buku:</label><br>
        <input type="text" name="judul" required><br><br>

        <label>Penulis:</label><br>
        <input type="text" name="penulis" required><br><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" required><br><br>

        <button type="submit" name="submit">Simpan Buku</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>