<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = [
            // Website Packages
            [
                'name' => 'Website Basic',
                'description' => 'Paket website sederhana untuk bisnis kecil',
                'price' => 2500000,
                'type' => 'website',
                'features' => [
                    '5 Halaman Website',
                    'Design Responsif',
                    'SEO Basic',
                    'Domain & Hosting 1 Tahun',
                    'Support 3 Bulan'
                ],
                'sort_order' => 1,
            ],
            [
                'name' => 'Website Professional',
                'description' => 'Paket website profesional dengan fitur lengkap',
                'price' => 5000000,
                'type' => 'website',
                'features' => [
                    '10 Halaman Website',
                    'Design Custom',
                    'SEO Advanced',
                    'CMS Admin Panel',
                    'Domain & Hosting 1 Tahun',
                    'Support 6 Bulan'
                ],
                'sort_order' => 2,
                'is_popular' => true,
            ],
            [
                'name' => 'Website Enterprise',
                'description' => 'Paket website enterprise dengan fitur premium',
                'price' => 10000000,
                'type' => 'website',
                'features' => [
                    'Unlimited Halaman',
                    'Design Premium',
                    'SEO Expert',
                    'Advanced CMS',
                    'E-commerce Integration',
                    'Domain & Hosting 1 Tahun',
                    'Support 12 Bulan'
                ],
                'sort_order' => 3,
            ],
            // Software Packages
            [
                'name' => 'Software Basic',
                'description' => 'Paket software sederhana untuk kebutuhan dasar',
                'price' => 5000000,
                'type' => 'software',
                'features' => [
                    'Aplikasi Desktop/Web',
                    'Database Integration',
                    'User Management',
                    'Basic Reporting',
                    'Support 3 Bulan'
                ],
                'sort_order' => 1,
            ],
            [
                'name' => 'Software Professional',
                'description' => 'Paket software profesional dengan fitur advanced',
                'price' => 10000000,
                'type' => 'software',
                'features' => [
                    'Multi-platform App',
                    'Advanced Database',
                    'Role-based Access',
                    'Advanced Reporting',
                    'API Integration',
                    'Support 6 Bulan'
                ],
                'sort_order' => 2,
                'is_popular' => true,
            ],
            [
                'name' => 'Software Enterprise',
                'description' => 'Paket software enterprise dengan fitur enterprise',
                'price' => 20000000,
                'type' => 'software',
                'features' => [
                    'Custom Development',
                    'Enterprise Database',
                    'Advanced Security',
                    'Real-time Analytics',
                    'Third-party Integration',
                    'Cloud Deployment',
                    'Support 12 Bulan'
                ],
                'sort_order' => 3,
            ],
            // Mobile App Packages
            [
                'name' => 'Mobile App Basic',
                'description' => 'Paket aplikasi mobile sederhana',
                'price' => 8000000,
                'type' => 'mobile_app',
                'features' => [
                    'Android App',
                    'Basic UI/UX',
                    'Database Integration',
                    'Push Notification',
                    'Support 3 Bulan'
                ],
                'sort_order' => 1,
            ],
            [
                'name' => 'Mobile App Professional',
                'description' => 'Paket aplikasi mobile profesional',
                'price' => 15000000,
                'type' => 'mobile_app',
                'features' => [
                    'Android & iOS App',
                    'Premium UI/UX',
                    'Advanced Features',
                    'Real-time Sync',
                    'Payment Integration',
                    'Support 6 Bulan'
                ],
                'sort_order' => 2,
                'is_popular' => true,
            ],
            [
                'name' => 'Mobile App Enterprise',
                'description' => 'Paket aplikasi mobile enterprise',
                'price' => 25000000,
                'type' => 'mobile_app',
                'features' => [
                    'Cross-platform App',
                    'Custom UI/UX',
                    'Advanced Security',
                    'Offline Capability',
                    'Analytics Integration',
                    'Cloud Backend',
                    'Support 12 Bulan'
                ],
                'sort_order' => 3,
            ],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}
