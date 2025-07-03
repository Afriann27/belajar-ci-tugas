# Toko Online CodeIgniter 4

Proyek ini adalah platform toko online yang dibangun menggunakan [CodeIgniter 4](https://codeigniter.com/). Sistem ini menyediakan beberapa fungsionalitas untuk toko online, termasuk manajemen produk, keranjang belanja, dan sistem transaksi.

## Daftar Isi

- [Fitur](#fitur)
1. Katalog Produk
Menampilkan daftar produk dengan gambar, harga, dan deskripsi.
-Fitur pencarian produk berdasarkan nama.
-Kategori produk untuk memudahkan pengelompokan.

2. Keranjang Belanja
-Tambah produk ke keranjang dari halaman katalog.
-Update jumlah produk secara dinamis.
-Hapus produk dari keranjang.

3. Checkout & Transaksi
-Form checkout untuk mengisi data pembelian.
-Menampilkan total harga secara otomatis.
-Menyimpan data transaksi ke database.
-Halaman riwayat transaksi untuk pengguna.

4. Sistem Diskon
-Menampilkan daftar diskon yang tersedia.
-Diskon ditampilkan dalam komponen sidebar halaman (tanpa redirect).
-Admin dapat menambah/menghapus diskon melalui panel admin.

5. Autentikasi dan Manajemen Pengguna
-Login dan register untuk pelanggan.
-Panel admin untuk mengelola produk, kategori, transaksi, dan diskon.
-Hak akses dibatasi sesuai peran (admin atau pengguna biasa).

6. Panel Admin (NiceAdmin)
-CRUD Produk.
-CRUD Kategori Produk.
-Laporan Transaksi.
-Export data ke PDF.
-Pengelolaan diskon.

7. Desain Responsif
Menggunakan template NiceAdmin untuk tampilan modern dan responsif di semua perangkat.

- [Persyaratan Sistem](#persyaratan-sistem)


- [Instalasi](#instalasi)
Untuk menjalankan proyek ini di lingkungan lokal, ikuti langkah-langkah berikut:

1. Clone Repository
Unduh salinan kode dari repository Git menggunakan perintah berikut:

git clone [URL repository]
cd afrian-project

2. Install Dependensi
Pastikan Composer sudah terinstal, lalu jalankan perintah:
composer install
Ini akan mengunduh semua dependensi yang dibutuhkan oleh proyek.


3. Konfigurasi Database

-Buka XAMPP dan aktifkan modul Apache dan MySQL.
-Masuk ke phpMyAdmin dan buat database baru dengan nama db_ci4.
-Salin file .env.example menjadi .env jika belum tersedia.
-Edit file .env dan sesuaikan konfigurasi database:

database.default.hostname = localhost
database.default.database = db_ci4
database.default.username = root
database.default.password =

4. Jalankan Migrasi dan Seeder
Untuk membuat struktur tabel dan mengisi data awal:

php spark migrate
php spark db:seed ProductSeeder
php spark db:seed UserSeeder
php spark db:seed DiskonSeeder

5. Menjalankan Server Lokal
Gunakan perintah berikut untuk memulai server:
php spark serve
Aplikasi dapat diakses melalui browser di alamat:
http://localhost:8080

- [Struktur Proyek](#struktur-proyek)
afrian-project/
│
├── app/
│   ├── Controllers/
│   │   ├── AuthController.php         # Autentikasi pengguna
│   │   ├── ProdukController.php       # Menampilkan katalog produk
│   │   ├── CartController.php         # Logika keranjang belanja
│   │   ├── CheckoutController.php     # Form checkout dan penyimpanan transaksi
│   │   ├── AdminController.php        # Panel admin dan manajemen data
│   │   └── DiskonController.php       # Komponen diskon sidebar
│   │
│   ├── Models/
│   │   ├── ProductModel.php
│   │   ├── UserModel.php
│   │   ├── DiskonModel.php
│   │   └── TransaksiModel.php
│   │
│   ├── Views/
│   │   ├── layout.php                 # Template utama
│   │   ├── v_produk.php              # Halaman produk
│   │   ├── v_keranjang.php           # Halaman keranjang
│   │   ├── v_checkout.php            # Halaman checkout
│   │   ├── v_diskon.php              # Komponen sidebar diskon
│   │   └── admin/                    # Template admin (NiceAdmin)
│
├── public/
│   ├── img/                           # Gambar produk
│   ├── NiceAdmin/                     # Template UI Admin
│   └── index.php                      # Entry point aplikasi
│
├── writable/                          # File log, cache, uploads
├── .env                               # Konfigurasi database & environment
├── composer.json                      # Dependensi Composer
└── README.md                          # Dokumentasi proyek
## Fitur

- Katalog Produk
  - Tampilan produk dengan gambar
  - Pencarian produk
- Keranjang Belanja
  - Tambah/hapus produk
  - Update jumlah produk
- Sistem Transaksi
  - Proses checkout
  - Riwayat transaksi
- Panel Admin
  - Manajemen produk (CRUD)
  - Manajemen kategori
  - Laporan transaksi
  - Export data ke PDF
- Sistem Autentikasi
  - Login/Register pengguna
  - Manajemen akun
- UI Responsif dengan NiceAdmin template

## Persyaratan Sistem

- PHP >= 8.2
- Composer
- Web server (XAMPP)

## Instalasi

1. **Clone repository ini**
   ```bash
   git clone [URL repository]
   cd belajar-ci-tugas
   ```
2. **Install dependensi**
   ```bash
   composer install
   ```
3. **Konfigurasi database**

   - Start module Apache dan MySQL pada XAMPP
   - Buat database **db_ci4** di phpmyadmin.
   - copy file .env dari tutorial https://www.notion.so/april-ns/Codeigniter4-Migration-dan-Seeding-045ffe5f44904e5c88633b2deae724d2

4. **Jalankan migrasi database**
   ```bash
   php spark migrate
   ```
5. **Seeder data**
   ```bash
   php spark db:seed ProductSeeder
   ```
   ```bash
   php spark db:seed UserSeeder
   ```
6. **Jalankan server**
   ```bash
   php spark serve
   ```
7. **Akses aplikasi**
   Buka browser dan akses `http://localhost:8080` untuk melihat aplikasi.

## Struktur Proyek

Proyek menggunakan struktur MVC CodeIgniter 4:

- app/Controllers - Logika aplikasi dan penanganan request
  - AuthController.php - Autentikasi pengguna
  - ProdukController.php - Manajemen produk
  - TransaksiController.php - Proses transaksi
- app/Models - Model untuk interaksi database
  - ProductModel.php - Model produk
  - UserModel.php - Model pengguna
- app/Views - Template dan komponen UI
  - v_produk.php - Tampilan produk
  - v_keranjang.php - Halaman keranjang
- public/img - Gambar produk dan aset
- public/NiceAdmin - Template admin
