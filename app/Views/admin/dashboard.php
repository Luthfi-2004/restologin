<!-- app/Views/admin/dashboard.php -->
<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/admin/dashboard">
                <i class="fas fa-cogs me-2"></i>Admin Panel
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="/admin/dashboard">
                    <i class="fas fa-tachometer-alt me-1"></i>Dashboard
                </a>
                <a class="nav-link" href="/admin/users">
                    <i class="fas fa-users me-1"></i>Kelola User
                </a>
                <span class="navbar-text me-3">
                    <i class="fas fa-user-shield me-1"></i>Welcome, <?= $user['username'] ?> (<?= ucfirst($user['role']) ?>)
                </span>
                <a class="nav-link" href="/auth/logout">
                    <i class="fas fa-sign-out-alt me-1"></i>Logout
                </a>
            </div>
        </div>
    </nav>
    
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h2><i class="fas fa-tachometer-alt me-2"></i>Admin Dashboard</h2>
                <div class="alert alert-success">
                    <i class="fas fa-shield-alt me-2"></i>
                    Selamat datang di dashboard admin! Anda memiliki akses penuh ke sistem restoran.
                </div>
            </div>
        </div>
        
        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title">Total Users</h5>
                                <h3><?= $stats['total_users'] ?? 0 ?></h3>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="/admin/users" class="text-white text-decoration-none">
                            <small>Lihat Detail <i class="fas fa-arrow-right"></i></small>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title">Pelanggan</h5>
                                <h3><?= $stats['total_pelanggan'] ?? 0 ?></h3>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-user-friends fa-2x"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small>Pengguna dengan role pelanggan</small>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title">Kasir</h5>
                                <h3><?= $stats['total_kasir'] ?? 0 ?></h3>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-cash-register fa-2x"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small>Staff kasir aktif</small>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card bg-danger text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title">Admin</h5>
                                <h3><?= $stats['total_admin'] ?? 0 ?></h3>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-user-shield fa-2x"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small>Administrator sistem</small>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Quick Actions -->
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="fas fa-bolt me-2"></i>Aksi Cepat</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <a href="/admin/users/create" class="btn btn-primary w-100">
                                    <i class="fas fa-user-plus me-2"></i>Tambah User Baru
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <a href="/admin/users" class="btn btn-info w-100">
                                    <i class="fas fa-users-cog me-2"></i>Kelola Users
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <button class="btn btn-warning w-100" onclick="alert('Fitur Kelola Menu akan segera tersedia!')">
                                    <i class="fas fa-utensils me-2"></i>Kelola Menu
                                </button>
                            </div>
                            <div class="col-md-6 mb-3">
                                <button class="btn btn-success w-100" onclick="alert('Fitur Laporan akan segera tersedia!')">
                                    <i class="fas fa-chart-line me-2"></i>Laporan
                                </button>
                            </div>
                        </div>
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Beberapa fitur akan aktif setelah modul restoran lengkap
                        </small>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="fas fa-info-circle me-2"></i>Informasi Sistem</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <strong>Sistem Login:</strong> Aktif
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <strong>User Management:</strong> Aktif
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-clock text-warning me-2"></i>
                                <strong>Menu Management:</strong> Pending
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-clock text-warning me-2"></i>
                                <strong>Order System:</strong> Pending
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-clock text-warning me-2"></i>
                                <strong>Payment System:</strong> Pending
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="card mt-3">
                    <div class="card-header">
                        <h5><i class="fas fa-history me-2"></i>Aktivitas Terbaru</h5>
                    </div>
                    <div class="card-body">
                        <div class="text-center text-muted">
                            <i class="fas fa-history fa-2x mb-2"></i>
                            <p class="mb-0">Belum ada aktivitas</p>
                            <small>Log aktivitas akan muncul di sini</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>