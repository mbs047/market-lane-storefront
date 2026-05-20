<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Smartphones', 'slug' => 'smartphones', 'description' => 'Flagship and everyday phones for work, travel, and media.', 'icon' => 'phone', 'display_order' => 1],
            ['name' => 'Computers', 'slug' => 'computers', 'description' => 'Laptops and portable computers for productivity and study.', 'icon' => 'laptop', 'display_order' => 2],
            ['name' => 'Audio', 'slug' => 'audio', 'description' => 'Headphones, earbuds, and listening gear for focused sound.', 'icon' => 'headphones', 'display_order' => 3],
            ['name' => 'TV & Home Theater', 'slug' => 'tv-home-theater', 'description' => 'Screens and entertainment devices for living rooms.', 'icon' => 'tv', 'display_order' => 4],
            ['name' => 'Gaming', 'slug' => 'gaming', 'description' => 'Consoles and accessories for home and handheld play.', 'icon' => 'gamepad', 'display_order' => 5],
            ['name' => 'Cameras', 'slug' => 'cameras', 'description' => 'Action and mirrorless cameras for creators.', 'icon' => 'camera', 'display_order' => 6],
            ['name' => 'E-readers', 'slug' => 'e-readers', 'description' => 'Focused reading devices with long battery life.', 'icon' => 'book-open', 'display_order' => 7],
            ['name' => 'Accessories', 'slug' => 'accessories', 'description' => 'Useful peripherals and desk upgrades.', 'icon' => 'mouse-pointer', 'display_order' => 8],
            ['name' => 'Home & Kitchen', 'slug' => 'home-kitchen', 'description' => 'Useful home appliances and everyday kitchen gear.', 'icon' => 'home', 'display_order' => 9],
            ['name' => 'Wearables', 'slug' => 'wearables', 'description' => 'Fitness watches and connected devices.', 'icon' => 'watch', 'display_order' => 10],
            ['name' => 'Toys', 'slug' => 'toys', 'description' => 'Creative sets and gifts for relaxed weekends.', 'icon' => 'sparkles', 'display_order' => 11],
        ];

        foreach ($categories as $category) {
            Category::query()->updateOrCreate(
                ['slug' => $category['slug']],
                $category + ['is_active' => true],
            );
        }
    }
}
