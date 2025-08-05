<!-- app/Views/admin/create_user.php -->
<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="/admin/dashboard">Dashboard</a>
                <a class="nav-link" href="/admin/users">Kelola User</a>
                <span class="navbar-text me-3">Welcome, <?= session()->get('username') ?></span>
                <a class="nav-link" href="/auth/logout">Logout</a>
            </div>
        </div>
    </nav>
    
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah User Baru</h4>
                        <small class="text-muted">Buat akun admin atau kasir</small>
                    </div>
                    <div class="card-body">
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('errors')): ?>
                            <div class="alert alert-danger">
                                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                    <p><?= $error ?></p>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <form action="/admin/users/store" method="post">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" value="<?= old('username') ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="<?= old('email') ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <select class="form-select" name="role" required>
                                    <option value="">Pilih Role</option>
                                    <option value="admin" <?= old('role') === 'admin' ? 'selected' : '' ?>>Admin</option>
                                    <option value="kasir" <?= old('role') === 'kasir' ? 'selected' : '' ?>>Kasir</option>
                                </select>
                                <small class="text-muted">Pelanggan bisa daftar sendiri melalui halaman register</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah User</button>
                            <a href="/admin/users" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>