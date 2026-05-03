<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Madinah Jaya Snack</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #fcfcfc; font-family: 'Inter', sans-serif; }
        .login-card { max-width: 400px; margin: 100px auto; border-radius: 16px; border: 1px solid #f0f0f0; }
        .btn-dark-custom { background-color: #0f0f0f; color: white; border-radius: 10px; width: 100%; }
    </style>
</head>
<body>
<div class="container">
    <div class="card login-card shadow-sm">
        <div class="card-body p-5">
            <h4 class="fw-bold mb-4 text-center">Masuk ke Sistem</h4>
            
            <?php if (isset($_GET['message'])): ?>
                <div class="alert alert-danger small"><?= htmlspecialchars($_GET['message']) ?></div>
            <?php endif; ?>

            <form method="POST" action="proses_login.php">
                <div class="mb-3">
                    <label class="form-label small fw-bold">Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label class="form-label small fw-bold">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-dark-custom py-2">Login Sekarang</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>