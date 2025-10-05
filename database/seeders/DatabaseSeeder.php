<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin BahariStack',
            'email' => 'admin@baharistack.com',
            'password' => Hash::make('password123'),
        ]);

          $this->call([
              BrandSettingSeeder::class,
              ServiceSeeder::class,
              PackageSeeder::class,
              PortfolioSeeder::class,
              ContactInfoSeeder::class,
          ]);
    }
}
