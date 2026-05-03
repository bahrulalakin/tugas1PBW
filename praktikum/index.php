<?php
    session_start();
    if (!isset($_SESSION['login_Un51k4'])) {
        header("Location: login.php?message=" .
        urlencode("Mengakses fitur harus login dulu bro."));
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <!-- Tambahkan Bootstrap agar tampilan tombol bagus -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <!-- Baris ini untuk menyapa user dan tombol logout -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Halo, <?= htmlspecialchars($_SESSION['nama']); ?>!</h4>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>

    <div class="card p-4">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia a, nihil numquam adipisci modi minus dolorem error asperiores consequuntur, commodi iure animi tenetur iste. Totam consequuntur suscipit vitae cum animi.</p>
    </div>
</body>
</html>