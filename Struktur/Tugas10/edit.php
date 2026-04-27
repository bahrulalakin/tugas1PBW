<?php 
include 'koneksi.php'; 
$id = $_GET['id'];
$stmt = mysqli_prepare($conn, "SELECT * FROM produk WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$d = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .form-card { max-width: 550px; margin: 80px auto; border: none; border-radius: 15px; }
    </style>
</head>
<body>
<div class="container">
    <div class="card form-card shadow-sm">
        <div class="card-body p-5">
            <h5 class="fw-bold mb-4">Edit Product Detail</h5>
            <form action="proses.php" method="POST">
                <input type="hidden" name="id" value="<?= $d['id'] ?>">
                
                <div class="mb-3">
                    <label class="form-label small fw-bold">Product Name</label>
                    <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($d['nama_produk']) ?>" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label small fw-bold">Price</label>
                        <input type="number" name="harga" class="form-control" value="<?= $d['harga'] ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label small fw-bold">Stock</label>
                        <input type="number" name="stok" class="form-control" value="<?= $d['stok'] ?>" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-bold">Category</label>
                    <select name="kategori" class="form-select">
                        <option <?= $d['kategori'] == 'Snack Kering' ? 'selected' : '' ?>>Snack Kering</option>
                        <option <?= $d['kategori'] == 'Snack Gurih' ? 'selected' : '' ?>>Snack Gurih</option>
                        <option <?= $d['kategori'] == 'Oleh-oleh' ? 'selected' : '' ?>>Oleh-oleh</option>
                    </select>
                </div>

                <button type="submit" name="update" class="btn btn-dark w-100 py-2 fw-bold mt-3">Update Changes</button>
                <div class="text-center mt-3">
                    <a href="index.php" class="text-muted small text-decoration-none">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>