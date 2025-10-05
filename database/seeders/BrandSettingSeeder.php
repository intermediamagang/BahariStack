<?php

namespace Database\Seeders;

use App\Models\BrandSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BrandSetting::create([
            'company_name' => 'BahariStack',
            'logo_path' => 'images/logo/BahariStack.png',
            'favicon_path' => 'images/logo/favicon.ico',
            'description' => 'Jasa pembuatan website, software, dan aplikasi android profesional dengan kualitas terbaik.',
            'email' => 'info@baharistack.com',
            'phone' => '+62 812-3456-7890',
            'address' => 'Jakarta, Indonesia',
            'website' => 'https://baharistack.com',
            'social_media' => [
                'facebook' => 'https://facebook.com/baharistack',
                'instagram' => 'https://instagram.com/baharistack',
                'linkedin' => 'https://linkedin.com/company/baharistack',
                'twitter' => 'https://twitter.com/baharistack',
            ],
        ]);
    }
}
