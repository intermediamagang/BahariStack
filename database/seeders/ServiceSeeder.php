<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Website Development',
                'description' => 'Kami membuat website yang responsif, modern, dan SEO-friendly sesuai kebutuhan bisnis Anda.',
                'icon' => 'fas fa-globe',
                'sort_order' => 1,
            ],
            [
                'title' => 'Software Development',
                'description' => 'Pengembangan aplikasi desktop dan web-based dengan teknologi terdepan untuk meningkatkan efisiensi bisnis.',
                'icon' => 'fas fa-laptop-code',
                'sort_order' => 2,
            ],
            [
                'title' => 'Mobile App Development',
                'description' => 'Pembuatan aplikasi Android dan iOS yang user-friendly dengan performa optimal.',
                'icon' => 'fas fa-mobile-alt',
                'sort_order' => 3,
            ],
            [
                'title' => 'UI/UX Design',
                'description' => 'Desain antarmuka yang menarik dan mudah digunakan untuk meningkatkan user experience.',
                'icon' => 'fas fa-paint-brush',
                'sort_order' => 4,
            ],
            [
                'title' => 'Digital Marketing',
                'description' => 'Strategi pemasaran digital yang efektif untuk meningkatkan visibilitas online bisnis Anda.',
                'icon' => 'fas fa-chart-line',
                'sort_order' => 5,
            ],
            [
                'title' => 'Maintenance & Support',
                'description' => 'Layanan maintenance dan support 24/7 untuk memastikan aplikasi Anda berjalan dengan optimal.',
                'icon' => 'fas fa-tools',
                'sort_order' => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
