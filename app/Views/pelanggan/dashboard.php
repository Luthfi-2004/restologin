<!-- app/Views/pelanggan/dashboard.php -->
<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="/pelanggan/dashboard">
                <i class="fas fa-user-circle me-2"></i>Portal Pelanggan
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
                <h2><i class="fas fa-tachometer-alt me-2"></i>Dashboard Pelanggan</h2>
                <div class="alert alert-success">
                    <i class="fas fa-heart me-2"></i>
                    Selamat datang di portal pelanggan! Nikmati pengalaman berkuliner terbaik bersama kami.
                </div>
            </div>
        </div>
        
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title">Total Pesanan</h5>
                                <h3>0</h3>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-shopping-bag fa-2x"></i>
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
                                <h5 class="card-title">Total Belanja</h5>
                                <h3>Rp 0</h3>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-wallet fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title">Poin Reward</h5>
                                <h3>0</h3>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-star fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="fas fa-utensils me-2"></i>Menu Favorit</h5>
                    </div>
                    <div class="card-body">
                        <div class="text-center text-muted py-4">
                            <i class="fas fa-utensils fa-3x mb-3"></i>
                            <h5>Menu Akan Segera Tersedia</h5>
                            <p>Kami sedang menyiapkan menu lezat untuk Anda</p>
                            <button class="btn btn-success" disabled>
                                <i class="fas fa-eye me-2"></i>Lihat Menu
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="card mt-4">
                    <div class="card-header">
                        <h5><i class="fas fa-history me-2"></i>Riwayat Pesanan</h5>
                    </div>
                    <div class="card-body">
                        <div class="text-center text-muted py-4">
                            <i class="fas fa-receipt fa-3x mb-3"></i>
                            <h5>Belum Ada Pesanan</h5>
                            <p>Riwayat pesanan Anda akan muncul di sini</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="fas fa-user-cog me-2"></i>Menu Akun</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary" disabled>
                                <i class="fas fa-user-edit me-2"></i>Edit Profil
                            </button>
                            <button class="btn btn-outline-info" disabled>
                                <i class="fas fa-map-marker-alt me-2"></i>Alamat Pengiriman
                            </button>
                            <button class="btn btn-outline-warning" disabled>
                                <i class="fas fa-credit-card me-2"></i>Metode Pembayaran
                            </button>
                            <button class="btn btn-outline-success" disabled>
                                <i class="fas fa-star me-2"></i>Program Loyalitas
                            </button>
                        </div>
                        <small class="text-muted mt-2 d-block">
                            <i class="fas fa-info-circle me-1"></i>
                            Fitur akan aktif setelah sistem lengkap
                        </small>
                    </div>
                </div>
                
                <div class="card mt-4">
                    <div class="card-header">
                        <h5><i class="fas fa-bell me-2"></i>Notifikasi</h5>
                    </div>
                    <div class="card-body">
                        <div class="text-center text-muted">
                            <i class="fas fa-bell-slash fa-2x mb-2"></i>
                            <p class="mb-0">Tidak ada notifikasi</p>
                        </div>
                    </div>
                </div>
                
                <div class="card mt-4">
                    <div class="card-header">
                        <h5><i class="fas fa-phone me-2"></i>Bantuan</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Butuh bantuan? Hubungi kami:</p>
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary btn-sm" disabled>
                                <i class="fas fa-comments me-2"></i>Live Chat
                            </button>
                            <button class="btn btn-outline-success btn-sm" disabled>
                                <i class="fab fa-whatsapp me-2"></i>WhatsApp
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>