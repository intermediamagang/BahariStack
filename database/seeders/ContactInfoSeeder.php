<?php

namespace Database\Seeders;

use App\Models\ContactInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contactInfos = [
            [
                'type' => 'email',
                'label' => 'Email',
                'value' => 'info@baharistack.com',
                'icon' => 'fas fa-envelope',
                'sort_order' => 1,
            ],
            [
                'type' => 'phone',
                'label' => 'Phone',
                'value' => '+62 812-3456-7890',
                'icon' => 'fas fa-phone',
                'sort_order' => 2,
            ],
            [
                'type' => 'address',
                'label' => 'Address',
                'value' => 'Jakarta, Indonesia',
                'icon' => 'fas fa-map-marker-alt',
                'sort_order' => 3,
            ],
            [
                'type' => 'whatsapp',
                'label' => 'WhatsApp',
                'value' => '+62 812-3456-7890',
                'icon' => 'fab fa-whatsapp',
                'sort_order' => 4,
            ],
        ];

        foreach ($contactInfos as $contactInfo) {
            ContactInfo::create($contactInfo);
        }
    }
}
