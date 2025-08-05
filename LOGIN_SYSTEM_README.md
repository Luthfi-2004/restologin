# Sistem Login Restoran - CodeIgniter 4

## Deskripsi
Sistem login terintegrasi untuk aplikasi restoran dengan role-based access control menggunakan CodeIgniter 4. Sistem ini menyediakan autentikasi yang aman dan dashboard yang berbeda untuk setiap role pengguna.

## Fitur Utama

### 1. Autentikasi
- ✅ Login dengan username atau email
- ✅ Registrasi pelanggan baru
- ✅ Password hashing yang aman
- ✅ Session management
- ✅ Logout functionality

### 2. Role-Based Access Control
- ✅ **Admin**: Akses penuh ke sistem, manajemen user
- ✅ **Kasir**: Dashboard untuk transaksi dan pesanan
- ✅ **Pelanggan**: Portal untuk melihat menu dan riwayat pesanan

### 3. Security Features
- ✅ Authentication Filter untuk melindungi routes
- ✅ Role-based route protection
- ✅ Password verification
- ✅ Session-based authentication
- ✅ CSRF protection ready

## Struktur Database

### Tabel Users
```sql
- id (INT, AUTO_INCREMENT, PRIMARY KEY)
- username (VARCHAR(100), UNIQUE)
- email (VARCHAR(100), UNIQUE)
- password (VARCHAR(255), HASHED)
- role (ENUM: 'pelanggan', 'admin', 'kasir')
- is_active (TINYINT, DEFAULT 1)
- created_at (DATETIME)
- updated_at (DATETIME)
```

## Default Credentials

### Admin Account
- **Username**: admin
- **Email**: admin@restoran.com
- **Password**: admin123
- **Role**: admin

## Routes Structure

### Public Routes
- `GET /` - Redirect ke login
- `GET /auth/login` - Halaman login
- `POST /auth/login` - Proses login
- `GET /auth/register` - Halaman registrasi
- `POST /auth/register` - Proses registrasi
- `GET /auth/logout` - Logout

### Protected Routes (dengan Authentication Filter)

#### Admin Routes (Role: admin)
- `GET /admin/dashboard` - Dashboard admin dengan statistik
- `GET /admin/users` - Manajemen user
- `GET /admin/users/create` - Form tambah user
- `POST /admin/users/store` - Simpan user baru
- `GET /admin/users/delete/{id}` - Hapus user

#### Kasir Routes (Role: kasir)
- `GET /kasir/dashboard` - Dashboard kasir

#### Pelanggan Routes (Role: pelanggan)
- `GET /pelanggan/dashboard` - Dashboard pelanggan

## File Structure

```
app/
├── Controllers/
│   ├── Auth.php              # Controller autentikasi
│   ├── Admin.php             # Controller admin
│   ├── Kasir.php             # Controller kasir
│   └── Pelanggan.php         # Controller pelanggan
├── Models/
│   └── UserModel.php         # Model untuk tabel users
├── Views/
│   ├── auth/
│   │   ├── login.php         # Form login
│   │   └── register.php      # Form registrasi
│   ├── admin/
│   │   ├── dashboard.php     # Dashboard admin
│   │   ├── users.php         # Manajemen user
│   │   └── create_user.php   # Form tambah user
│   ├── kasir/
│   │   └── dashboard.php     # Dashboard kasir
│   └── pelanggan/
│       └── dashboard.php     # Dashboard pelanggan
├── Filters/
│   └── AuthFilter.php        # Filter autentikasi
├── Database/
│   ├── Migrations/
│   │   └── 2025-08-05-021259_CreateUsersTable.php
│   └── Seeds/
│       └── AdminSeeder.php   # Seeder untuk admin default
└── Config/
    ├── Routes.php            # Konfigurasi routes
    └── Filters.php           # Konfigurasi filters
```

## Instalasi dan Setup

### 1. Database Migration
```bash
php spark migrate
```

### 2. Seeding Admin User
```bash
php spark db:seed AdminSeeder
```

### 3. Menjalankan Aplikasi
```bash
php spark serve
```

Akses aplikasi di: `http://localhost:8080`

## Cara Penggunaan

### 1. Login sebagai Admin
- Buka browser ke `http://localhost:8080`
- Login dengan kredensial admin default
- Akses dashboard admin dengan statistik lengkap
- Kelola user melalui menu "Kelola User"

### 2. Registrasi Pelanggan Baru
- Klik "Belum punya akun? Register" di halaman login
- Isi form registrasi (otomatis role pelanggan)
- Login dengan akun yang baru dibuat

### 3. Menambah User Admin/Kasir
- Login sebagai admin
- Masuk ke "Kelola User" > "Tambah User"
- Pilih role admin atau kasir
- User baru dapat login dengan kredensial yang dibuat

## Security Features

### 1. Authentication Filter
Filter `AuthFilter` melindungi semua routes yang memerlukan autentikasi:
- Mengecek session login
- Memvalidasi role pengguna
- Redirect ke login jika tidak terautentikasi

### 2. Password Security
- Password di-hash menggunakan `password_hash()` PHP
- Verifikasi menggunakan `password_verify()`
- Minimum 6 karakter untuk password

### 3. Session Management
- Session data aman untuk menyimpan informasi user
- Auto-destroy session saat logout
- Session timeout handling

## Customization

### 1. Menambah Role Baru
1. Update enum di migration tabel users
2. Tambah validasi di UserModel
3. Buat controller dan views baru
4. Update AuthFilter jika diperlukan
5. Tambah routes dengan filter yang sesuai

### 2. Menambah Field User
1. Buat migration baru untuk alter table
2. Update UserModel `$allowedFields`
3. Update form registrasi dan create user
4. Update validasi rules

### 3. Styling Custom
- Semua views menggunakan Bootstrap 5
- Font Awesome untuk icons
- Mudah di-customize sesuai brand restoran

## Status Development

### ✅ Completed Features
- [x] User authentication system
- [x] Role-based access control
- [x] Admin dashboard dengan statistik
- [x] User management (CRUD)
- [x] Responsive UI dengan Bootstrap 5
- [x] Security filters dan validasi

### 🔄 Future Features (Ready for Extension)
- [ ] Menu management system
- [ ] Order management system
- [ ] Payment integration
- [ ] Reporting system
- [ ] Email notifications
- [ ] Password reset functionality

## Troubleshooting

### Error "Access denied"
- Pastikan user sudah login
- Periksa role user sesuai dengan route yang diakses
- Clear session dan login ulang

### Error Database
- Pastikan migration sudah dijalankan
- Periksa konfigurasi database di `.env`
- Jalankan seeder untuk data default

### Error 404
- Periksa routes di `app/Config/Routes.php`
- Pastikan controller dan method ada
- Periksa case-sensitive pada nama file

## Support

Sistem ini siap untuk dikembangkan lebih lanjut dengan modul-modul restoran seperti:
- Manajemen menu dan kategori
- Sistem pemesanan online
- Integrasi payment gateway
- Sistem laporan dan analytics
- Notifikasi real-time

---

**Developed with ❤️ using CodeIgniter 4**