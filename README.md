
# Sistem Pengurusan & Analitik Homestay Malaysia

**Pemilik:** MOTAC, Tourism Malaysia  
**Versi:** 0.1.0 (Laravel 12.x)

## Matlamat Sistem

Sistem Pengurusan & Analitik Homestay Malaysia ialah platform digital bersepadu untuk memodenkan pengurusan, pemantauan, dan analitik industri Homestay di seluruh Malaysia. Sistem ini membolehkan MOTAC dan Tourism Malaysia mengumpul, mengesahkan, dan menganalisis data Homestay secara berpusat, sekaligus meningkatkan kecekapan pelaporan, ketelusan data, dan pembuatan keputusan strategik.

## Ciri Utama

- Import data Excel (XLSX/CSV) untuk prestasi, kapasiti, dan struktur pengurusan Homestay
- Validasi automatik, pratonton, dan pelaporan ralat import
- Dashboard interaktif (nasional, negeri, koperasi, individu)
- Analitik pelbagai dimensi: negeri, model pengurusan, asal pelawat, pendapatan, kapasiti
- Eksport data dan laporan ke Excel/PDF
- Akses berasaskan peranan (Admin, Penganalisis, Pemerhati) menggunakan Laravel Policies
- Audit trail untuk semua perubahan data penting dan sejarah import
- Notifikasi status import, amaran data tidak lengkap, dan aktiviti sistem
- Integrasi API (MOTAC, Tourism Malaysia, sistem analitik pihak ketiga)
- Antaramuka mesra pengguna, responsif, dan patuh WCAG 2.1 AA

## Teknologi Utama

- **Backend:** Laravel (v12+), Eloquent ORM, Policies/Gates
- **Frontend:** Blade, Livewire, AlpineJS, Bootstrap 5+, Chart.js
- **Database:** MySQL/MariaDB
- **Integrasi Excel:** Maatwebsite/Laravel-Excel
- **Autentikasi/Autorisasi:** Laravel Sanctum, Spatie Laravel Permission
- **Queue/Notifikasi:** Laravel Queue (Redis), Notification, Horizon
- **Hosting:** LAMP/LEMP stack, on-premise atau cloud (AWS, DigitalOcean)

## Keperluan Sistem & Prestasi

- Menyokong >50,000 Homestay dan 10 tahun data prestasi
- Import Excel sehingga 10,000 baris dalam <3 minit
- Dashboard utama dimuatkan <2 saat
- Akses serentak sehingga 500 pengguna
- Perlindungan penuh daripada CSRF, SQL injection, dan XSS

## Panduan Pantas Pemasangan

1. Klon repositori & pasang kebergantungan:

```bash
composer install
npm install
```

1. Salin fail environment:

```bash
cp .env.example .env
```

1. Tetapkan pembolehubah environment dalam `.env` (DB, Redis, Mail, dll)

1. Jana kunci aplikasi:

```bash
php artisan key:generate
```

1. Jalankan migrasi & seeder:

```bash
php artisan migrate --seed
```

1. Bina aset frontend:

```bash
npm run dev
```

1. Mulakan pelayan tempatan:

```bash
php artisan serve
```

## Dokumentasi & Rujukan

- Lihat folder `/docs/` untuk dokumen arkitektur, keperluan, dan spesifikasi teknikal.
- Rujuk dokumen rasmi MOTAC untuk piawaian dan konteks sistem.

## Sumbangan & Lesen

Sumbangan dialu-alukan! Sila rujuk [Laravel documentation](https://laravel.com/docs/contributions) untuk panduan sumbangan dan [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

Sistem ini menggunakan lesen [MIT](https://opensource.org/licenses/MIT).
