<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = [
            ['name' => 'Mariam Al Nuaimi', 'email' => 'mariam@example.com', 'phone' => '+971501110001', 'city' => 'Abu Dhabi', 'loyalty_tier' => 'gold', 'is_vip' => true, 'joined_at' => now()->subMonths(18)],
            ['name' => 'Omar Hassan', 'email' => 'omar@example.com', 'phone' => '+971501110002', 'city' => 'Dubai', 'loyalty_tier' => 'silver', 'is_vip' => false, 'joined_at' => now()->subMonths(11)],
            ['name' => 'Sara Mansoor', 'email' => 'sara@example.com', 'phone' => '+971501110003', 'city' => 'Sharjah', 'loyalty_tier' => 'bronze', 'is_vip' => false, 'joined_at' => now()->subMonths(6)],
            ['name' => 'Khalid Saeed', 'email' => 'khalid@example.com', 'phone' => '+971501110004', 'city' => 'Al Ain', 'loyalty_tier' => 'gold', 'is_vip' => true, 'joined_at' => now()->subMonths(22)],
            ['name' => 'Noora Ali', 'email' => 'noora@example.com', 'phone' => '+971501110005', 'city' => 'Dubai', 'loyalty_tier' => 'silver', 'is_vip' => false, 'joined_at' => now()->subMonths(9)],
            ['name' => 'Yousef Rahman', 'email' => 'yousef@example.com', 'phone' => '+971501110006', 'city' => 'Ajman', 'loyalty_tier' => 'bronze', 'is_vip' => false, 'joined_at' => now()->subMonths(4)],
            ['name' => 'Aisha Salem', 'email' => 'aisha@example.com', 'phone' => '+971501110007', 'city' => 'Abu Dhabi', 'loyalty_tier' => 'platinum', 'is_vip' => true, 'joined_at' => now()->subYears(3)],
            ['name' => 'Hamdan Khalifa', 'email' => 'hamdan@example.com', 'phone' => '+971501110008', 'city' => 'Ras Al Khaimah', 'loyalty_tier' => 'silver', 'is_vip' => false, 'joined_at' => now()->subMonths(14)],
        ];

        foreach ($customers as $customer) {
            Customer::query()->updateOrCreate(
                ['email' => $customer['email']],
                $customer + ['country' => 'United Arab Emirates'],
            );
        }
    }
}
