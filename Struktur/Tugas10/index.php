<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory | Madinah Jaya Snack</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #fcfcfc;
            font-family: 'Inter', sans-serif;
            color: #1a1a1a;
        }
        .page-title { font-weight: 700; letter-spacing: -0.5px; }
        .text-subtitle { color: #8e8e8e; font-weight: 400; }
        
        .card-custom {
            background: #ffffff;
            border: 1px solid #f0f0f0;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.02);
        }

        .search-box {
            background-color: #f8f9fa;
            border-radius: 12px;
            border: none;
            padding: 0.6rem 1rem;
            box-shadow: none;
        }
        .search-box:focus { 
            background-color: #fff; 
            border: 1px solid #e0e0e0; 
            box-shadow: 0 0 0 3px rgba(0,0,0,0.03); 
        }

        .btn-dark-custom {
            background-color: #0f0f0f;
            color: white;
            border-radius: 10px;
            font-weight: 500;
            padding: 0.6rem 1.2rem;
            transition: all 0.2s ease;
        }
        .btn-dark-custom:hover { 
            background-color: #2a2a2a; 
            color: white; 
            transform: translateY(-1px); 
        }

        .table { margin-bottom: 0; }
        .table th {
            font-weight: 500;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            color: #a0a0a0;
            border-bottom: 1px solid #f0f0f0;
            padding-bottom: 1rem;
        }
        .table td {
            vertical-align: middle;
            border-bottom: 1px solid #f9f9f9;
            padding: 1rem 0.5rem;
            font-size: 0.9rem;
        }
        .table tr:last-child td { border-bottom: none; }
        .table tr:hover td { background-color: #fafafa; }

        .action-icon {
            color: #a0a0a0;
            font-size: 1.1rem;
            transition: 0.2s;
        }
        .action-icon.edit:hover { color: #0d6efd; }
        .action-icon.delete:hover { color: #dc3545; }
        
        .badge-stock {
            background-color: #f4f4f5;
            color: #3f3f46;
            font-weight: 500;
            padding: 0.4em 0.8em;
            border-radius: 8px;
        }
    </style>
</head>
<body>

    <div class="container py-5" style="max-width: 1000px;">
        
        <div class="d-flex justify-content-between align-items-end mb-5">
            <div>
                <h3 class="page-title m-0">Inventory Overview</h3>
                <p class="text-subtitle mt-1 mb-0">Manage Madinah Jaya Snack stock</p>
            </div>
            <div>
                <a href="tambah.php" class="btn btn-dark-custom shadow-sm">
                    <i class="bi bi-plus-lg me-1"></i> New Product
                </a>
            </div>
        </div>

        <?php if(isset($_GET['status'])): ?>
            <div class="alert alert-success alert-dismissible fade show border-0 mb-4" role="alert" style="background-color: #ecfdf5; color: #065f46; border-radius: 12px;">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                    <span>
                        <?php 
                            if($_GET['status'] == 'success') echo "Product has been successfully <strong>added</strong>.";
                            if($_GET['status'] == 'updated') echo "Product details have been <strong>updated</strong>.";
                            if($_GET['status'] == 'deleted') echo "Product has been <strong>removed</strong>.";
                        ?>
                    </span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="filter: opacity(0.5);"></button>
            </div>
        <?php endif; ?>

        <div class="card card-custom p-2">
            <div class="card-body">
                
                <form method="GET" class="mb-4">
                    <div class="position-relative" style="max-width: 300px;">
                        <i class="bi bi-search position-absolute text-muted" style="top: 50%; left: 15px; transform: translateY(-50%); font-size: 0.9rem;"></i>
                        <input type="text" name="cari" class="form-control search-box" style="padding-left: 40px;" placeholder="Search products..." value="<?= $_GET['cari'] ?? '' ?>">
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="ps-3">Product Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th class="text-center">Stock</th>
                                <th class="text-end pe-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $search = isset($_GET['cari']) ? "%" . $_GET['cari'] . "%" : "%";
                            $stmt = mysqli_prepare($conn, "SELECT * FROM produk WHERE nama_produk LIKE ? ORDER BY id DESC");
                            mysqli_stmt_bind_param($stmt, "s", $search);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);

                            if(mysqli_num_rows($result) == 0) {
                                echo '<tr><td colspan="5" class="text-center py-5 text-muted">No products found.</td></tr>';
                            }

                            while ($row = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td class="fw-medium ps-3" style="color: #222;"><?= htmlspecialchars($row['nama_produk']) ?></td>
                                    <td class="text-muted"><?= htmlspecialchars($row['kategori']) ?></td>
                                    <td class="fw-medium">Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                                    <td class="text-center">
                                        <span class="badge-stock"><?= $row['stok'] ?></span>
                                    </td>
                                    <td class="text-end pe-3">
                                        <a href="edit.php?id=<?= $row['id'] ?>" class="action-icon edit me-3 text-decoration-none" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>  
                                        <a href="proses.php?hapus=<?= $row['id'] ?>" class="action-icon delete text-decoration-none" title="Delete" onclick="return confirm('Are you sure you want to delete this product?')">
                                            <i class="bi bi-trash3"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>