<div align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">

  <h1>📢 Aplikasi Pengaduan Masyarakat (Titanium Edition) ✨</h1>
  <p><strong>Aplikasi pelaporan publik yang <i>lowkey</i> overpowered, no cap. 🧢</strong></p>
</div>

---

## 💅 The Vibe (Introduction)

<i>Welcome to the era of aesthetic vibes!</i> ✨
Aplikasi Pengaduan Masyarakat ini di- *migrate* secara spesifik dengan *framework* **Laravel 12** yang ngasih *developer experience* paling mulus sejagat raya. 

Nggak cuma *backend*-nya doang yang *flexing* arsitektur keren, tapi **UI/UX-nya 100% Titanium Apple iOS Guidelines**. *FR FR* (For Real, For Real) antarmukanya super premium dengan *glassmorphism*, sudut-sudut *rounded-2xl* yang empuk, *diffused soft-shadows*, pokoknya *pleasing to the eyes* banget. 👀✨

Aplikasi ini dibikin *strict* buat nge- *filter* mana yang *admin/petugas* dan mana yang *masyarakat biasa* (menggunakan *Roles & Gates* asli bawaan Laravel, rapi abis!). 

---

## 🛠️ Main Tech Stack (The GOATs)

- **[Laravel 12](https://laravel.com):** Sang *Core Engine*. Stabil, aman, ngacir. 🚀
- **[TailwindCSS 3](https://tailwindcss.com):** Yang ngasih efek "Titanium" 💅
- **[Chart.js](https://www.chartjs.org):** Buat visualisasi data pie chart di dashboard biar keliatan *smart* 🤓
- **[Alpine.js](https://alpinejs.dev/):** *Sprinkle* interaktivitas javascript tipis-tipis gampang (*kayak fitur hide/show password eye blink*). 👁️

---

## 🔥 Features That Slap

- **Titanium UI/UX Interface:** Tampilan yang *super clean*, modern, dark-zinc vibes. Bikin betah natap layar berjam-jam. 📱
- **Role-based Authentication:** Login dipisah berdasarkan level (Admin, Petugas, Masyarakat). Gak ada ceritanya *user* biasa iseng intip rahasia negara. 🛡️
- **No Email Authentication:** Login & Register full pakai `Username` + `NIK` 16 Digit & `Nomor HP`. Nggak butuh email-email-an lagi, sangat cocok buat iklim masyarakat lokal. ☎️
- **File Upload Validator:** Masyarakat bisa melampirkan foto-foto bukti (*receipt*). Udah diamankan dengan batas maksimal 10MB dengan format `png, jpg, webp`. *If it's too big, it ain't gonna pass!* ❌
- **Cascade Deletion Protocols:** *Petugas* dilarang ngehapus akunnya sendiri dari dashboard (mencegah *suicide* akun admin tak sengaja 💀). Pengaduan juga gak bisa sembarang *delete* kalau udah ada yang nanggapin. 

---

## 💻 How to Run (Localhost Vibing)

Lagi pengen nyoba aplikasinya secara langsung? Beranjak dari kursi dan ikuti panduan *step-by-step* yang super gampang ini:

### 1. The Pre-requisites
Pastikan kamu udah punya modal ini di laptop kesayangan:
- **PHP >= 8.2** (Wajib update kalau masih PHP purba 🙏)
- **Composer** (Package manager yang setia)
- **Node.js & NPM** (Buat *compile* baju/aset Tailwind-nya)
- **Database Server** (XAMPP / Laragon / apa aja yang penting *MySQL/MariaDB* jalan!)

### 2. Setup Database & Configs (Getting Ready)
1. Buka *phpMyAdmin* atau *Database Manager* favoritmu.
2. Bikin *database* kosong dengan nama `aplikasi_pengaduan_masyarakat`.
3. Buka konfigurasi `.env` (Kalau nggak ada, cukup *copy* file `.env.example` ubah ke `.env`), terus cocokin sama server lokalmu:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=aplikasi_pengaduan_masyarakat
DB_USERNAME=root
DB_PASSWORD=
```

### 3. The Ritual (Install & Build)
Buka terminal alias jendela hitam *hacker*, pastikan posisinya di map folder aplikasi ini, langsung hajar kode sakti ini:

```bash
# Donlod bahan-bahan Backend
composer install

# Panggil jin buat masangin struktur Database + Akun default dari langit
php artisan migrate:fresh --seed

# Donlod bahan-bahan Frontend & Compile bajunya (CSS/JS)
npm install
npm run build
```

### 4. Lift Off! 🛸
Udah selesai semua? Langsung jalankan server bawaan Laravel-nya:

```bash
php artisan serve
```

Buka browser kecintaanmu di 👉 `http://127.0.0.1:8000`.

*Voila!* Kamu bakal langsung ngeliat halamannya. Buat ngetes masuk, pake kunci ini:
> **Masuk Sebagai Admin Utama:**
> - **Username:** `admin`
> - **Kata Sandi:** `password`

> **Masuk Sebagai Masyarakat Test:**
> - **Username:** `masyarakat`
> - **Kata Sandi:** `password`

---

## 🤝 The Rules of Code 

*Repository* ini dibuat khusus dengan dedikasi untuk tugas migrasi ke ekosistem Laravel nan asri. Bebas dimodifikasi asal tetap jaga kerapihan filenya! 

*Stay aesthetic, happy coding!* 💻✨
