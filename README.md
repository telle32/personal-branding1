# Personal Branding Website

Aplikasi web portfolio personal berbasis Laravel yang menampilkan profil, portofolio, keahlian, layanan, dan testimoni secara dinamis dengan panel admin untuk pengelolaan konten.

---

## Teknologi yang Digunakan

| Teknologi | Versi |
|-----------|-------|
| PHP | 8.2.12 |
| Laravel | 10.50.2 |
| MariaDB | 10.4.32 |
| XAMPP | 3.3.0 |
| Bootstrap | 5.3.3 |
| Bootstrap Icons | 1.11.3 |
| AOS.js | 2.3.4 |

---

## Fitur Utama

- Halaman beranda dinamis (Hero, Layanan, Skill, Portfolio, Testimoni, Tentang, Kontak)
- Panel Admin untuk CRUD:
  - Portfolio (dengan upload gambar)
  - Testimoni (toggle aktif/nonaktif)
  - Skill (level progress bar)
  - Layanan (toggle aktif/nonaktif)
- Filter portfolio berdasarkan kategori (tanpa reload halaman)
- Kontak via WhatsApp
- Desain responsif & modern (dark theme)

---

## Cara Instalasi

### Prasyarat
- XAMPP 3.3.0 (PHP 8.2.12 + MariaDB 10.4.32)
- Composer
- Node.js & NPM

---

### Langkah Instalasi

**1. Ekstrak project**
```
Ekstrak file ZIP ke folder yang diinginkan
Contoh: C:\xampp\htdocs\personal-branding
```

**2. Install dependensi PHP**
```bash
composer install
```

**3. Salin file konfigurasi**
```bash
cp .env.example .env
```

**4. Generate application key**
```bash
php artisan key:generate
```

**5. Buat database & import**

Buka **phpMyAdmin** (`http://localhost/phpmyadmin`) lalu:
- Buat database baru bernama: `personal_branding`
- Import file: `database/personal_branding.sql`

**6. Konfigurasi `.env`**

Sesuaikan pengaturan database di file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=personal_branding
DB_USERNAME=root
DB_PASSWORD=
```

**7. Buat symbolic link storage**
```bash
php artisan storage:link
```

**8. Install dependensi Node.js**
```bash
npm install
npm run build
```

**9. Jalankan aplikasi**
```bash
php artisan serve
```

Buka browser dan akses: **http://127.0.0.1:8000**

---

## Akses Panel Admin

URL Admin: `http://127.0.0.1:8000/admin/portofolio`

| Menu | URL |
|------|-----|
| Portfolio | `/admin/portofolio` |
| Testimoni | `/admin/testimonial` |
| Skill | `/admin/skill` |
| Layanan | `/admin/service` |

---

## Struktur Direktori

```
personal-branding/
├── app/
│   ├── Http/Controllers/     ← HomeController, PortfolioController, dll
│   └── Models/               ← Portfolio, Testimonial, Skill, Service
├── database/
│   ├── migrations/           ← Struktur tabel database
│   └── personal_branding.sql ← File dump database (import ini!)
├── resources/views/
│   ├── layouts/              ← Layout app.blade.php & admin.blade.php
│   ├── home.blade.php        ← Halaman beranda
│   └── admin/                ← View CRUD admin
├── routes/
│   └── web.php               ← Definisi semua route
└── public/
    └── storage/              ← Gambar yang diupload
```

---

## Dibuat Oleh

**Feno Zikrillah**  
GitHub: https://github.com/telle32