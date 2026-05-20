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
            ['name' => 'Google', 'slug' => 'google', 'country' => 'United States', 'website' => 'https://store.google.com', 'support_email' => 'support@example.google', 'is_featured' => true],
            ['name' => 'OnePlus', 'slug' => 'oneplus', 'country' => 'China', 'website' => 'https://www.oneplus.com', 'support_email' => 'support@example.oneplus', 'is_featured' => false],
            ['name' => 'Motorola', 'slug' => 'motorola', 'country' => 'United States', 'website' => 'https://www.motorola.com', 'support_email' => 'support@example.motorola', 'is_featured' => false],
            ['name' => 'Lenovo', 'slug' => 'lenovo', 'country' => 'China', 'website' => 'https://www.lenovo.com', 'support_email' => 'support@example.lenovo', 'is_featured' => false],
            ['name' => 'HP', 'slug' => 'hp', 'country' => 'United States', 'website' => 'https://www.hp.com', 'support_email' => 'support@example.hp', 'is_featured' => false],
            ['name' => 'ASUS', 'slug' => 'asus', 'country' => 'Taiwan', 'website' => 'https://www.asus.com', 'support_email' => 'support@example.asus', 'is_featured' => false],
            ['name' => 'Acer', 'slug' => 'acer', 'country' => 'Taiwan', 'website' => 'https://www.acer.com', 'support_email' => 'support@example.acer', 'is_featured' => false],
            ['name' => 'LG', 'slug' => 'lg', 'country' => 'South Korea', 'website' => 'https://www.lg.com', 'support_email' => 'support@example.lg', 'is_featured' => false],
            ['name' => 'TCL', 'slug' => 'tcl', 'country' => 'China', 'website' => 'https://www.tcl.com', 'support_email' => 'support@example.tcl', 'is_featured' => false],
            ['name' => 'Hisense', 'slug' => 'hisense', 'country' => 'China', 'website' => 'https://www.hisense.com', 'support_email' => 'support@example.hisense', 'is_featured' => false],
            ['name' => 'Nikon', 'slug' => 'nikon', 'country' => 'Japan', 'website' => 'https://www.nikon.com', 'support_email' => 'support@example.nikon', 'is_featured' => false],
            ['name' => 'Fujifilm', 'slug' => 'fujifilm', 'country' => 'Japan', 'website' => 'https://www.fujifilm.com', 'support_email' => 'support@example.fujifilm', 'is_featured' => false],
            ['name' => 'Insta360', 'slug' => 'insta360', 'country' => 'China', 'website' => 'https://www.insta360.com', 'support_email' => 'support@example.insta360', 'is_featured' => false],
            ['name' => 'Kobo', 'slug' => 'kobo', 'country' => 'Canada', 'website' => 'https://www.kobo.com', 'support_email' => 'support@example.kobo', 'is_featured' => false],
            ['name' => 'Anker', 'slug' => 'anker', 'country' => 'China', 'website' => 'https://www.anker.com', 'support_email' => 'support@example.anker', 'is_featured' => false],
            ['name' => 'Belkin', 'slug' => 'belkin', 'country' => 'United States', 'website' => 'https://www.belkin.com', 'support_email' => 'support@example.belkin', 'is_featured' => false],
            ['name' => 'KitchenAid', 'slug' => 'kitchenaid', 'country' => 'United States', 'website' => 'https://www.kitchenaid.com', 'support_email' => 'support@example.kitchenaid', 'is_featured' => false],
            ['name' => 'Philips', 'slug' => 'philips', 'country' => 'Netherlands', 'website' => 'https://www.philips.com', 'support_email' => 'support@example.philips', 'is_featured' => false],
            ['name' => 'Breville', 'slug' => 'breville', 'country' => 'Australia', 'website' => 'https://www.breville.com', 'support_email' => 'support@example.breville', 'is_featured' => false],
            ['name' => 'iRobot', 'slug' => 'irobot', 'country' => 'United States', 'website' => 'https://www.irobot.com', 'support_email' => 'support@example.irobot', 'is_featured' => false],
            ['name' => 'Shark', 'slug' => 'shark', 'country' => 'United States', 'website' => 'https://www.sharkclean.com', 'support_email' => 'support@example.shark', 'is_featured' => false],
            ['name' => 'Fitbit', 'slug' => 'fitbit', 'country' => 'United States', 'website' => 'https://www.fitbit.com', 'support_email' => 'support@example.fitbit', 'is_featured' => false],
            ['name' => 'Valve', 'slug' => 'valve', 'country' => 'United States', 'website' => 'https://www.steampowered.com', 'support_email' => 'support@example.valve', 'is_featured' => false],
            ['name' => 'Razer', 'slug' => 'razer', 'country' => 'United States', 'website' => 'https://www.razer.com', 'support_email' => 'support@example.razer', 'is_featured' => false],
            ['name' => 'Beats', 'slug' => 'beats', 'country' => 'United States', 'website' => 'https://www.beatsbydre.com', 'support_email' => 'support@example.beats', 'is_featured' => false],
            ['name' => 'JBL', 'slug' => 'jbl', 'country' => 'United States', 'website' => 'https://www.jbl.com', 'support_email' => 'support@example.jbl', 'is_featured' => false],
            ['name' => 'Sennheiser', 'slug' => 'sennheiser', 'country' => 'Germany', 'website' => 'https://www.sennheiser-hearing.com', 'support_email' => 'support@example.sennheiser', 'is_featured' => false],
            ['name' => 'Marshall', 'slug' => 'marshall', 'country' => 'United Kingdom', 'website' => 'https://www.marshall.com', 'support_email' => 'support@example.marshall', 'is_featured' => false],
            ['name' => 'Meta', 'slug' => 'meta', 'country' => 'United States', 'website' => 'https://www.meta.com', 'support_email' => 'support@example.meta', 'is_featured' => false],
            ['name' => 'SteelSeries', 'slug' => 'steelseries', 'country' => 'Denmark', 'website' => 'https://steelseries.com', 'support_email' => 'support@example.steelseries', 'is_featured' => false],
            ['name' => 'SanDisk', 'slug' => 'sandisk', 'country' => 'United States', 'website' => 'https://www.westerndigital.com/brand/sandisk', 'support_email' => 'support@example.sandisk', 'is_featured' => false],
            ['name' => 'TP-Link', 'slug' => 'tp-link', 'country' => 'China', 'website' => 'https://www.tp-link.com', 'support_email' => 'support@example.tplink', 'is_featured' => false],
            ['name' => 'Ubiquiti', 'slug' => 'ubiquiti', 'country' => 'United States', 'website' => 'https://ui.com', 'support_email' => 'support@example.ubiquiti', 'is_featured' => false],
            ['name' => 'Ring', 'slug' => 'ring', 'country' => 'United States', 'website' => 'https://ring.com', 'support_email' => 'support@example.ring', 'is_featured' => false],
            ['name' => 'Arlo', 'slug' => 'arlo', 'country' => 'United States', 'website' => 'https://www.arlo.com', 'support_email' => 'support@example.arlo', 'is_featured' => false],
        ];

        foreach ($brands as $brand) {
            Brand::query()->updateOrCreate(
                ['slug' => $brand['slug']],
                $brand,
            );
        }
    }
}
