<!-- app/Views/admin/users.php -->
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
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Kelola User</h2>
            <a href="/admin/users/create" class="btn btn-primary">Tambah User</a>
        </div>
        
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>
        
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td>
                            <span class="badge bg-<?= $user['role'] === 'admin' ? 'danger' : ($user['role'] === 'kasir' ? 'warning' : 'success') ?>">
                                <?= ucfirst($user['role']) ?>
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-<?= $user['is_active'] ? 'success' : 'secondary' ?>">
                                <?= $user['is_active'] ? 'Aktif' : 'Nonaktif' ?>
                            </span>
                        </td>
                        <td><?= date('d/m/Y', strtotime($user['created_at'])) ?></td>
                        <td>
                            <?php if ($user['id'] !== session()->get('user_id')): ?>
                                <a href="/admin/users/delete/<?= $user['id'] ?>" 
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</a>
                            <?php else: ?>
                                <span class="text-muted">Akun Anda</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>