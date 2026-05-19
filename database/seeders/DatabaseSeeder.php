<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use App\Models\Skill;
use App\Models\Service;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Skills
        $skills = [
            ['name' => 'Laravel / PHP', 'category' => 'Backend', 'level' => 10, 'icon' => 'bi-code-slash', 'order' => 1],
            ['name' => 'JavaScript', 'category' => 'Frontend', 'level' => 5, 'icon' => 'bi-filetype-js', 'order' => 2],
            ['name' => 'MySQL', 'category' => 'Database', 'level' => 15, 'icon' => 'bi-database', 'order' => 3],
            ['name' => 'Bootstrap / CSS', 'category' => 'Frontend', 'level' => 12, 'icon' => 'bi-palette', 'order' => 4],
            ['name' => 'C Programming', 'category' => 'Backend', 'level' => 50, 'icon' => 'bi-c-circle', 'order' => 5],
            ['name' => 'Git & Version Control', 'category' => 'Tools', 'level' => 20, 'icon' => 'bi-git', 'order' => 6],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }

        // Services
        $services = [
            [
                'title'       => 'Web Development',
                'description' => 'Membangun website modern, responsif, dan berkinerja tinggi menggunakan teknologi terkini seperti Laravel & Bootstrap.',
                'icon'        => 'bi-laptop',
                'price'       => 'Mulai Rp 500.000',
                'is_active'   => true,
                'order'       => 1,
            ],
            [
                'title'       => 'UI/UX Design',
                'description' => 'Merancang antarmuka pengguna yang intuitif dan menarik, berfokus pada pengalaman pengguna yang optimal.',
                'icon'        => 'bi-vector-pen',
                'price'       => 'Mulai Rp 300.000',
                'is_active'   => true,
                'order'       => 2,
            ],
            [
                'title'       => 'API Integration',
                'description' => 'Mengintegrasikan berbagai layanan dan API pihak ketiga untuk memperluas fungsionalitas aplikasi Anda.',
                'icon'        => 'bi-cloud-arrow-up',
                'price'       => 'Mulai Rp 400.000',
                'is_active'   => true,
                'order'       => 3,
            ],
            [
                'title'       => 'Konsultasi IT',
                'description' => 'Memberikan saran dan solusi teknis terbaik untuk membantu bisnis Anda berkembang di era digital.',
                'icon'        => 'bi-chat-dots',
                'price'       => 'Gratis Konsultasi',
                'is_active'   => true,
                'order'       => 4,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        // Portfolios
        $portfolios = [
            [
                'title'       => 'E-Commerce Platform',
                'category'    => 'Web App',
                'description' => 'Platform e-commerce lengkap dengan fitur manajemen produk, keranjang belanja, pembayaran online, dan dashboard admin.',
                'image'       => null,
                'url'         => 'https://example.com',
                'github_url'  => 'https://github.com',
                'is_featured' => true,
                'order'       => 1,
            ],
            [
                'title'       => 'Personal Branding Website',
                'category'    => 'Website',
                'description' => 'Website personal branding dengan desain modern, portfolio showcase, dan integrasi WhatsApp untuk kontak langsung.',
                'image'       => null,
                'url'         => 'https://example.com',
                'github_url'  => 'https://github.com',
                'is_featured' => true,
                'order'       => 2,
            ],
            [
                'title'       => 'UMKM Catalog App',
                'category'    => 'Web App',
                'description' => 'Aplikasi katalog produk UMKM dengan fitur WhatsApp order otomatis, manajemen stok, dan laporan penjualan.',
                'image'       => null,
                'url'         => 'https://example.com',
                'github_url'  => 'https://github.com',
                'is_featured' => true,
                'order'       => 3,
            ],
            [
                'title'       => 'Dashboard Analytics',
                'category'    => 'Dashboard',
                'description' => 'Dashboard analitik real-time dengan visualisasi data interaktif, laporan otomatis, dan notifikasi cerdas.',
                'image'       => null,
                'url'         => 'https://example.com',
                'github_url'  => 'https://github.com',
                'is_featured' => false,
                'order'       => 4,
            ],
            [
                'title'       => 'Restaurant POS System',
                'category'    => 'Web App',
                'description' => 'Sistem Point of Sale untuk restoran dengan manajemen menu, order online, laporan harian, dan integrasi printer.',
                'image'       => null,
                'url'         => 'https://example.com',
                'github_url'  => 'https://github.com',
                'is_featured' => false,
                'order'       => 5,
            ],
            [
                'title'       => 'Booking & Reservation System',
                'category'    => 'Web App',
                'description' => 'Sistem reservasi online untuk hotel dan villa dengan kalender booking, konfirmasi otomatis, dan manajemen kamar.',
                'image'       => null,
                'url'         => 'https://example.com',
                'github_url'  => 'https://github.com',
                'is_featured' => false,
                'order'       => 6,
            ],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::create($portfolio);
        }
    }
}
