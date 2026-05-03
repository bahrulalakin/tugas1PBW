<?php
include 'koneksi.php';

// Validasi ID dari URL (?id=5)
if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id  = $_GET['id'];

    $stmt = $conn->prepare(
        "DELETE FROM buku WHERE id=?"
    );
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        // Jika berhasil hapus, langsung balik ke index.php
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menghapus data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID tidak valid!";
}

$conn->close();
?>