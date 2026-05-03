<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul   = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $harga   = $_POST['harga'];

    $stmt = $conn->prepare(
        "INSERT INTO buku
        (judul, penulis, harga)
        VALUES (?,?,?)"
    );
    
    $stmt->bind_param("ssi",
        $judul, $penulis, $harga);
    
    // Cek apakah eksekusi berhasil
    if ($stmt->execute()) {
        // Jika berhasil, arahkan kembali ke index.php
        header("Location: index.php");
        exit(); 
    } else {
        echo "Gagal menyimpan data: " . $stmt->error;
    }
}