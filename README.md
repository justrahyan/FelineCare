# FelineCare 🐾
### Sistem Pakar Diagnosa Penyakit Kucing

FelineCare adalah aplikasi berbasis web yang dirancang untuk membantu pemilik kucing mengenali gejala penyakit pada anabul secara dini. Proyek ini dikembangkan sebagai tugas mata kuliah **Sistem Pakar** dengan menerapkan metode **Hybrid Forward Chaining** (untuk alur konsultasi interaktif) dan **Certainty Factor** (untuk mengukur tingkat kepastian diagnosa).

---

## 🚀 Fitur Utama

- **Interactive Consultation Wizard:** Alur tanya-jawab sistematis 4-langkah untuk menentukan gejala.
- **Inference Engine:** Perhitungan akurat menggunakan bobot pakar (MB & MD).
- **Management Basis Pengetahuan:** Panel admin untuk mengelola penyakit, gejala, dan aturan (Rules).
- **Riwayat Konsultasi:** Pencatatan otomatis setiap hasil diagnosa pengguna.
- **Responsive Design:** Antarmuka modern menggunakan Tailwind CSS yang nyaman diakses dari perangkat apapun.

---

## 🛠️ Prasyarat (Prerequisites)

Sebelum menjalankan proyek ini, pastikan Anda telah menginstal:

- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL/MariaDB (XAMPP/Laragon)

---

## 💻 Instalasi & Konfigurasi

Ikuti langkah-langkah berikut untuk menjalankan proyek di komputer lokal Anda:

### 1. Clone Project
```bash
git clone https://github.com/justrahyan/FelineCare.git
cd FelineCare
```

### 2. Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install Frontend dependencies
npm install
```

### 3. Konfigurasi Environment (`.env`)

Salin file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```

Buka file `.env` dan sesuaikan konfigurasi database serta timezone Anda:
```env
APP_NAME=FelineCare
APP_TIMEZONE=Asia/Makassar
APP_LOCALE=id

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=feline_care
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate App Key & Link Storage
```bash
php artisan key:generate
php artisan storage:link
```

### 5. Migrasi & Seeding Database

Pastikan database `feline_care` sudah dibuat di MySQL Anda, lalu jalankan:
```bash
php artisan migrate:fresh --seed
```

---

## 🏃 Cara Menjalankan Aplikasi

Anda perlu menjalankan dua terminal secara bersamaan:

**Terminal 1 (Backend):**
```bash
php artisan serve
```

**Terminal 2 (Frontend/Compiler):**
```bash
npm run dev
```

Akses aplikasi melalui browser di alamat:
**http://127.0.0.1:8000**

---

## 🧪 Metode yang Digunakan

Aplikasi ini menggunakan pendekatan **Hybrid Inference**:

- **Forward Chaining:** Digunakan pada antarmuka pengguna untuk memandu proses pemilihan gejala secara bertahap (per kategori) dari fakta menuju kesimpulan.
- **Certainty Factor (CF):** Digunakan untuk menangani ketidakpastian dalam diagnosa. Rumus yang diimplementasikan adalah:

$$CF[h,e] = MB[h,e] - MD[h,e]$$

$$CF_{combine}(CF_1, CF_2) = CF_1 + CF_2 \times (1 - CF_1)$$

---

## 📄 Lisensi

Proyek ini dibuat untuk tujuan akademik. Silakan gunakan dan kembangkan sesuai kebutuhan.

---

> Dibuat oleh **Muhammad Rahyan Noorfauzan**