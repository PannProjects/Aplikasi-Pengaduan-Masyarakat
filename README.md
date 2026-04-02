# Aplikasi Pengaduan Masyarakat

Aplikasi pelaporan publik berbasis web yang dibangun menggunakan Laravel 12. Proyek ini merupakan migrasi dari arsitektur lama (CakePHP) ke sistem yang lebih modern, cepat, dan aman. Tampilan antarmukanya (UI) juga dirombak menggunakan Tailwind CSS dengan tema *Titanium/Zinc* yang *clean*, simpel, dan responsif.

## Fitur Utama

- **Multi-Role Access:** Hak akses dibagi menjadi 3 level utama: Admin, Petugas, dan Masyarakat.
- **Autentikasi Kustom:** Proses login diubah agar sepenuhnya memakai `Username` (bukan email). Registrasi masyarakat membutuhkan data valid seperti `NIK` (16 digit) dan Nomor Telepon.
- **Upload Laporan & Bukti:** Fasilitas pengaduan memungkinkan masyarakat untuk mengunggah bukti foto pendukung. File dibatasi maksimal 10MB dengan spesifikasi format gambar yang aman (jpg, png, webp).
- **Proses Penanganan Terpusat:** Petugas atau Admin dapat meninjau, memberikan tanggapan, dan mengupdate status laporan secara interaktif (Baru -> Proses -> Selesai).
- **Dashboard Data Visual:** Halaman beranda utama menyajikan ringkasan jumlah laporan beserta *Doughnut Chart* (menggunakan Chart.js) untuk visualisasi cepat.
- **Proteksi Logika Data:** Aplikasi sudah dibekali *constraint* agar admin/petugas tidak dapat menghapus akunnya sendiri, dan laporan yang sudah ditanggapi otomatis tidak bisa dihapus sembarangan.

## Kebutuhan Sistem

Sebelum memulai instalasi, pastikan sistem Anda memiliki lingkungan berikut:
- PHP >= 8.2
- Composer
- Node.js & NPM
- Database MySQL atau MariaDB

## Panduan Instalasi Lokal

Ikuti cara instalasi berikut untuk menjalankan proyek di komputer/server Anda sendiri.

### 1. Install Dependencies
Buka terminal/command prompt, lalu arahkan ke direktori root proyek ini dan ketikkan perintah berikut:
```bash
composer install
npm install
```

### 2. Pengaturan Konfigurasi (.env)
Buka file `.env` (jika belum ada, buat dengan mengkopi dari `.env.example`).
Sesuaikan bagian informasi *database* agar terhubung dengan environment MySQL lokal Anda:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=aplikasi_pengaduan_masyarakat
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Migrasi Database & Data Dummy
Buka aplikasi *Database Manager* Anda (seperti phpMyAdmin, DBeaver, dll) dan buat sebuah *database* baru dengan nama: `aplikasi_pengaduan_masyarakat`.

Jika database sudah dibuat, jalankan perintah migrasi ini di terminal agar Laravel membangun struktur tabel sekaligus menyisipkan akun uji coba bawaan seeder:
```bash
php artisan migrate:fresh --seed
```

### 4. Build Assets & Server Start
Terakhir, *compile* berkas aset UI dan nyalakan server lokal Laravel:
```bash
npm run build
php artisan serve
```

Proyek sekarang bisa diakses melalui web browser di: `http://localhost:8000`

---

## Akun Tes Default

Apabila proses *seeder* berhasil, Anda bisa masuk menggunakan kredensial ini untuk mulai mencoba aplikasinya:

**Login Admin:**
- Username: `admin`
- Password: `password`

**Login Masyarakat:**
- Username: `asepbakar`
- Password: `password`

---
*Proyek ini diperbarui pada April 2026.*
