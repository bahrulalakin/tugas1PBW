<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .form-card { max-width: 550px; margin: 80px auto; border: none; border-radius: 15px; }
        .form-control:focus { border-color: #2b2d42; box-shadow: none; }
    </style>
</head>
<body>
<div class="container">
    <div class="card form-card shadow-sm">
        <div class="card-body p-5">
            <h5 class="fw-bold mb-4">Add New Entry</h5>
            <form action="proses.php" method="POST">
                <div class="mb-3">
                    <label class="form-label small fw-bold">Product Name</label>
                    <input type="text" name="nama" class="form-control" placeholder=" Kuping Gajah" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label small fw-bold">Price</label>
                        <input type="number" name="harga" class="form-control" placeholder="0" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label small fw-bold">Current Stock</label>
                        <input type="number" name="stok" class="form-control" placeholder="0" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-bold">Category</label>
                    <select name="kategori" class="form-select">
                        <option>Snack Kering</option>
                        <option>Snack Gurih</option>
                        <option>Oleh-oleh</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="form-label small fw-bold">Notes</label>
                    <textarea name="keterangan" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" name="tambah" class="btn btn-dark w-100 py-2 fw-bold">Publish Product</button>
                <div class="text-center mt-3">
                    <a href="index.php" class="text-muted small text-decoration-none">← Back to Dashboard</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>