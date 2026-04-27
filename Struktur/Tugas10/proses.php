<?php
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $stmt = mysqli_prepare($conn, "INSERT INTO produk (nama_produk, kategori, harga, stok, keterangan) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssiis", $_POST['nama'], $_POST['kategori'], $_POST['harga'], $_POST['stok'], $_POST['keterangan']);
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php?status=success");
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }
}

if (isset($_GET['hapus'])) {
    $stmt = mysqli_prepare($conn, "DELETE FROM produk WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $_GET['hapus']);
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php?status=deleted");
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kat  = $_POST['kategori'];
    $hrg  = $_POST['harga'];
    $stok = $_POST['stok'];

    $stmt = mysqli_prepare($conn, "UPDATE produk SET nama_produk=?, kategori=?, harga=?, stok=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "ssiii", $nama, $kat, $hrg, $stok, $id);
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php?status=updated");
    } else {
        echo "Update failed: " . mysqli_stmt_error($stmt);
    }
}
?>

