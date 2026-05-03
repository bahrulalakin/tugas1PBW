<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $id    = $_POST['id'];
    $judul = $_POST['judul'];
    $harga = $_POST['harga'];

    $stmt = $conn->prepare(
        "UPDATE buku
        SET Judul=?, Harga=?
        WHERE ID=?"
    );
    
    // s = string, d = double, i = integer
    $stmt->bind_param("sdi", $judul, $harga, $id);
    
    if ($stmt->execute()) {
        // Jika berhasil update, balik ke index.php
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal mengupdate data: " . $stmt->error;
    }
    
    $stmt->close();
}

$conn->close();
?>