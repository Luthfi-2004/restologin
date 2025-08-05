<!-- app/Views/kasir/dashboard.php -->
<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/kasir/dashboard">
                <i class="fas fa-cash-register me-2"></i>Kasir Panel
            </a>
            <div class="navbar-nav ms-auto">
                <span class="navbar-text me-3">
                    <i class="fas fa-user me-1"></i>Welcome, <?= $user['username'] ?> (<?= ucfirst($user['role']) ?>)
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
                <h2><i class="fas fa-tachometer-alt me-2"></i>Dashboard Kasir</h2>
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    Selamat datang di dashboard kasir! Anda dapat mengelola transaksi dan pesanan.
                </div>
            </div>
        </div>
        
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title">Transaksi Hari Ini</h5>
                                <h3>0</h3>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-shopping-cart fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title">Pesanan Aktif</h5>
                                <h3>0</h3>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-clock fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title">Total Penjualan</h5>
                                <h3>Rp 0</h3>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-money-bill-wave fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card bg-danger text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title">Menu Tersedia</h5>
                                <h3>0</h3>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-utensils fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="fas fa-plus-circle me-2"></i>Menu Cepat</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" onclick="alert('Fitur Transaksi Baru akan segera tersedia!')">
                                <i class="fas fa-plus me-2"></i>Transaksi Baru
                            </button>
                            <button class="btn btn-info" onclick="alert('Fitur Lihat Pesanan akan segera tersedia!')">
                                <i class="fas fa-list me-2"></i>Lihat Pesanan
                            </button>
                            <button class="btn btn-warning" onclick="alert('Fitur Kelola Menu akan segera tersedia!')">
                                <i class="fas fa-utensils me-2"></i>Kelola Menu
                            </button>
                            <button class="btn btn-success" onclick="alert('Fitur Laporan Harian akan segera tersedia!')">
                                <i class="fas fa-chart-bar me-2"></i>Laporan Harian
                            </button>
                        </div>
                        <small class="text-muted mt-2 d-block">
                            <i class="fas fa-exclamation-triangle me-1"></i>
                            Fitur akan aktif setelah sistem restoran lengkap
                        </small>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="fas fa-history me-2"></i>Aktivitas Terbaru</h5>
                    </div>
                    <div class="card-body">
                        <div class="text-center text-muted">
                            <i class="fas fa-inbox fa-3x mb-3"></i>
                            <p>Belum ada aktivitas</p>
                            <small>Transaksi dan aktivitas akan muncul di sini</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>