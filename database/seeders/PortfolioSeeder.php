<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $portfolios = [
            [
                'title' => 'E-Commerce Website Toko Online',
                'description' => 'Website e-commerce modern dengan fitur lengkap untuk toko online. Dilengkapi dengan sistem pembayaran, manajemen inventory, dan dashboard admin yang user-friendly.',
                'image_path' => 'images/portfolios/ecommerce-website.jpg',
                'category' => 'website',
                'client_name' => 'Toko ABC',
                'project_url' => 'https://tokoabc.com',
                'technologies' => ['Laravel', 'Vue.js', 'MySQL', 'Bootstrap', 'Stripe'],
                'project_date' => '2024-01-15',
                'sort_order' => 1,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Sistem Manajemen Inventori',
                'description' => 'Aplikasi desktop untuk manajemen inventori dengan fitur barcode scanning, laporan real-time, dan integrasi dengan sistem akuntansi.',
                'image_path' => 'images/portfolios/inventory-system.jpg',
                'category' => 'software',
                'client_name' => 'CV Maju Jaya',
                'project_url' => null,
                'technologies' => ['C#', 'WPF', 'SQL Server', 'Crystal Reports'],
                'project_date' => '2024-02-20',
                'sort_order' => 2,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Aplikasi Mobile Food Delivery',
                'description' => 'Aplikasi mobile untuk layanan pesan antar makanan dengan fitur GPS tracking, notifikasi real-time, dan sistem rating.',
                'image_path' => 'images/portfolios/food-delivery-app.jpg',
                'category' => 'mobile_app',
                'client_name' => 'Foodie App',
                'project_url' => 'https://play.google.com/store/apps/details?id=com.foodie.app',
                'technologies' => ['React Native', 'Node.js', 'MongoDB', 'Firebase'],
                'project_date' => '2024-03-10',
                'sort_order' => 3,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => 'Website Company Profile',
                'description' => 'Website company profile yang elegan dan responsif dengan animasi modern, SEO optimized, dan CMS yang mudah digunakan.',
                'image_path' => 'images/portfolios/company-profile.jpg',
                'category' => 'website',
                'client_name' => 'PT Sejahtera',
                'project_url' => 'https://ptsejahtera.com',
                'technologies' => ['WordPress', 'PHP', 'MySQL', 'jQuery'],
                'project_date' => '2024-04-05',
                'sort_order' => 4,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => 'Sistem HR Management',
                'description' => 'Aplikasi web untuk manajemen sumber daya manusia dengan fitur absensi, payroll, dan laporan kinerja karyawan.',
                'image_path' => 'images/portfolios/hr-management.jpg',
                'category' => 'software',
                'client_name' => 'PT Global Tech',
                'project_url' => null,
                'technologies' => ['Laravel', 'React', 'PostgreSQL', 'Redis'],
                'project_date' => '2024-05-12',
                'sort_order' => 5,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Aplikasi Mobile Banking',
                'description' => 'Aplikasi mobile banking dengan fitur transfer, pembayaran tagihan, investasi, dan keamanan multi-layer.',
                'image_path' => 'images/portfolios/mobile-banking.jpg',
                'category' => 'mobile_app',
                'client_name' => 'Bank Digital',
                'project_url' => 'https://apps.apple.com/app/bank-digital/id123456789',
                'technologies' => ['Flutter', 'Dart', 'Firebase', 'REST API'],
                'project_date' => '2024-06-18',
                'sort_order' => 6,
                'is_featured' => false,
                'is_active' => true,
            ],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::create($portfolio);
        }
    }
}
