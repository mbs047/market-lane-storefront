<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['name' => 'Apple', 'slug' => 'apple', 'country' => 'United States', 'website' => 'https://www.apple.com', 'support_email' => 'support@example.apple', 'is_featured' => true],
            ['name' => 'Samsung', 'slug' => 'samsung', 'country' => 'South Korea', 'website' => 'https://www.samsung.com', 'support_email' => 'support@example.samsung', 'is_featured' => true],
            ['name' => 'Sony', 'slug' => 'sony', 'country' => 'Japan', 'website' => 'https://www.sony.com', 'support_email' => 'support@example.sony', 'is_featured' => true],
            ['name' => 'Dell', 'slug' => 'dell', 'country' => 'United States', 'website' => 'https://www.dell.com', 'support_email' => 'support@example.dell', 'is_featured' => false],
            ['name' => 'Nintendo', 'slug' => 'nintendo', 'country' => 'Japan', 'website' => 'https://www.nintendo.com', 'support_email' => 'support@example.nintendo', 'is_featured' => false],
            ['name' => 'Bose', 'slug' => 'bose', 'country' => 'United States', 'website' => 'https://www.bose.com', 'support_email' => 'support@example.bose', 'is_featured' => false],
            ['name' => 'GoPro', 'slug' => 'gopro', 'country' => 'United States', 'website' => 'https://www.gopro.com', 'support_email' => 'support@example.gopro', 'is_featured' => false],
            ['name' => 'Amazon', 'slug' => 'amazon', 'country' => 'United States', 'website' => 'https://www.amazon.com', 'support_email' => 'support@example.amazon', 'is_featured' => false],
            ['name' => 'Logitech', 'slug' => 'logitech', 'country' => 'Switzerland', 'website' => 'https://www.logitech.com', 'support_email' => 'support@example.logitech', 'is_featured' => false],
            ['name' => 'Microsoft', 'slug' => 'microsoft', 'country' => 'United States', 'website' => 'https://www.microsoft.com', 'support_email' => 'support@example.microsoft', 'is_featured' => false],
            ['name' => 'Dyson', 'slug' => 'dyson', 'country' => 'United Kingdom', 'website' => 'https://www.dyson.com', 'support_email' => 'support@example.dyson', 'is_featured' => false],
            ['name' => 'Instant Pot', 'slug' => 'instant-pot', 'country' => 'Canada', 'website' => 'https://www.instantpot.com', 'support_email' => 'support@example.instantpot', 'is_featured' => false],
            ['name' => 'Ninja', 'slug' => 'ninja', 'country' => 'United States', 'website' => 'https://www.ninjakitchen.com', 'support_email' => 'support@example.ninja', 'is_featured' => false],
            ['name' => 'Garmin', 'slug' => 'garmin', 'country' => 'United States', 'website' => 'https://www.garmin.com', 'support_email' => 'support@example.garmin', 'is_featured' => false],
            ['name' => 'Canon', 'slug' => 'canon', 'country' => 'Japan', 'website' => 'https://www.canon.com', 'support_email' => 'support@example.canon', 'is_featured' => false],
            ['name' => 'LEGO', 'slug' => 'lego', 'country' => 'Denmark', 'website' => 'https://www.lego.com', 'support_email' => 'support@example.lego', 'is_featured' => false],
        ];

        foreach ($brands as $brand) {
            Brand::query()->updateOrCreate(
                ['slug' => $brand['slug']],
                $brand,
            );
        }
    }
}
