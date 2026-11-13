# HMS – E-Commerce Sales Website

## Deskripsi Proyek

HMS merupakan website e-commerce yang dikembangkan sebagai proyek akhir dalam program pelatihan **PHP for e-Application (Preparation for S1 Thesis)** di BINUS Center. Website ini dibuat untuk menerapkan konsep pengembangan aplikasi web menggunakan PHP dan database MySQL, mulai dari pengelolaan produk hingga proses transaksi pembelian.

## Live Demo

Website dapat diakses melalui tautan berikut:

[**Kunjungi HMS – E-Commerce Website**](https://ecommerce-hms.free.nf/)

## Fitur Utama

### Pengguna
- Registrasi akun dan login.
- Melihat katalog produk yang tersedia.
- Melihat detail produk, termasuk gambar, deskripsi, harga, dan stok.
- Menambahkan produk ke keranjang belanja.
- Mengatur jumlah produk sesuai stok yang tersedia.
- Melihat ringkasan belanja dan total pembayaran.
- Melakukan checkout setelah login.
- Melihat konfirmasi transaksi beserta ID transaksi.

### Administrator
- Login administrator.
- Mengelola data produk (tambah, lihat, ubah, dan hapus).
- Mengelola kategori produk.
- Mengelola data anggota atau pengguna.
- Mengelola data administrator.
- Melakukan pencarian data produk, anggota, dan administrator.

## Teknologi yang Digunakan

- **PHP** – Pengembangan sisi server.
- **MySQL** – Pengelolaan database.
- **SQL** – Pengolahan data dalam database.
- **HTML** – Struktur halaman website.
- **CSS** – Tampilan dan desain website.
- **JavaScript** – Interaksi pada halaman website.
- **phpMyAdmin** – Pengelolaan database MySQL.

## Struktur Folder

```text
hms/
│
├── admin/
│   ├── add_admin.php
│   ├── add_kategori.php
│   ├── add_member.php
│   ├── add_product.php
│   ├── admin.php
│   ├── data_admin.php
│   ├── edit_admin.php
│   ├── edit_kategori.php
│   ├── edit_member.php
│   ├── edit_product.php
│   ├── index.php
│   ├── kategori.php
│   ├── member.php
│   ├── product.php
│   ├── session.php
│   ├── koneksi.php
│   ├── login/logout dan file pendukung
│   ├── css/
│   ├── images/
│   └── scripts/
│
├── css/
│   └── style.css
│
├── database/
│   └── 127_0_0_1 (1).sql
│
├── images/
├── product/
│
├── confirm_order.php
├── detail_cart.php
├── detail_checkout.php
├── detail_product.php
├── footer.php
├── header.php
├── index.php
├── koneksi.php
├── login.php
├── login2.php
├── logout.php
├── menu.php
├── product.php
├── proses_order.php
├── register.php
├── session.php
├── template.php
└── title.php
```

## Cara Menjalankan Proyek

1. Clone repository ini:

   ```bash
   git clone https://github.com/snrahmawati9-pixel/hms.git
   ```

2. Pindahkan folder proyek ke direktori server lokal, misalnya `htdocs` pada XAMPP.

3. Jalankan Apache dan MySQL melalui XAMPP.

4. Buka phpMyAdmin, kemudian buat database baru.

5. Import file SQL yang tersedia di folder `database/`.

6. Sesuaikan konfigurasi koneksi database pada file `koneksi.php`.

7. Buka website melalui browser:

   ```text
   http://localhost/hms/
   ```

## Informasi Proyek

- **Jenis Proyek:** Website E-Commerce
- **Program:** PHP for e-Application (Preparation for S1 Thesis)
- **Institusi:** BINUS Center 
- **Periode:** November – Desember 2018
- **Hasil:** High Distinction
