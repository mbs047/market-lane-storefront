<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['sku' => 'PRD-1001', 'name' => 'Apple iPhone 15 Pro 256GB', 'brand' => 'Apple', 'category' => 'Smartphones', 'price' => 1099.00, 'stock' => 12],
            ['sku' => 'PRD-1002', 'name' => 'Samsung Galaxy S24 Ultra', 'brand' => 'Samsung', 'category' => 'Smartphones', 'price' => 1299.99, 'stock' => 10],
            ['sku' => 'PRD-1003', 'name' => 'Sony WH-1000XM5 Headphones', 'brand' => 'Sony', 'category' => 'Audio', 'price' => 399.99, 'stock' => 18],
            ['sku' => 'PRD-1004', 'name' => 'Apple MacBook Air 13-inch M3', 'brand' => 'Apple', 'category' => 'Computers', 'price' => 1099.00, 'stock' => 8],
            ['sku' => 'PRD-1005', 'name' => 'Dell XPS 13 Laptop', 'brand' => 'Dell', 'category' => 'Computers', 'price' => 999.99, 'stock' => 7],
            ['sku' => 'PRD-1006', 'name' => 'Nintendo Switch OLED Model', 'brand' => 'Nintendo', 'category' => 'Gaming', 'price' => 349.99, 'stock' => 15],
            ['sku' => 'PRD-1007', 'name' => 'Apple AirPods Pro (2nd Generation)', 'brand' => 'Apple', 'category' => 'Audio', 'price' => 249.00, 'stock' => 22],
            ['sku' => 'PRD-1008', 'name' => 'Samsung 55-inch Class QLED 4K TV', 'brand' => 'Samsung', 'category' => 'Televisions', 'price' => 799.99, 'stock' => 6],
            ['sku' => 'PRD-1009', 'name' => 'Bose QuietComfort Ultra Earbuds', 'brand' => 'Bose', 'category' => 'Audio', 'price' => 299.00, 'stock' => 14],
            ['sku' => 'PRD-1010', 'name' => 'GoPro HERO12 Black', 'brand' => 'GoPro', 'category' => 'Cameras', 'price' => 399.99, 'stock' => 9],
            ['sku' => 'PRD-1011', 'name' => 'Kindle Paperwhite 16GB', 'brand' => 'Amazon', 'category' => 'E-readers', 'price' => 149.99, 'stock' => 20],
            ['sku' => 'PRD-1012', 'name' => 'Logitech MX Master 3S Mouse', 'brand' => 'Logitech', 'category' => 'Accessories', 'price' => 99.99, 'stock' => 30],
            ['sku' => 'PRD-1013', 'name' => 'PlayStation 5 Console', 'brand' => 'Sony', 'category' => 'Gaming', 'price' => 499.99, 'stock' => 11],
            ['sku' => 'PRD-1014', 'name' => 'Xbox Series X', 'brand' => 'Microsoft', 'category' => 'Gaming', 'price' => 499.99, 'stock' => 9],
            ['sku' => 'PRD-1015', 'name' => 'Dyson V15 Detect Vacuum', 'brand' => 'Dyson', 'category' => 'Home Appliances', 'price' => 749.99, 'stock' => 5],
            ['sku' => 'PRD-1016', 'name' => 'Instant Pot Duo 7-in-1 6 Quart', 'brand' => 'Instant Pot', 'category' => 'Kitchen', 'price' => 99.95, 'stock' => 16],
            ['sku' => 'PRD-1017', 'name' => 'Ninja Foodi DualZone Air Fryer', 'brand' => 'Ninja', 'category' => 'Kitchen', 'price' => 199.99, 'stock' => 13],
            ['sku' => 'PRD-1018', 'name' => 'Garmin Forerunner 265', 'brand' => 'Garmin', 'category' => 'Wearables', 'price' => 449.99, 'stock' => 8],
            ['sku' => 'PRD-1019', 'name' => 'Canon EOS R50 Mirrorless Camera', 'brand' => 'Canon', 'category' => 'Cameras', 'price' => 679.99, 'stock' => 6],
            ['sku' => 'PRD-1020', 'name' => 'LEGO Icons Bouquet of Roses', 'brand' => 'LEGO', 'category' => 'Toys', 'price' => 59.99, 'stock' => 24],
        ];

        foreach ($products as $product) {
            Product::query()->updateOrCreate(
                ['sku' => $product['sku']],
                $product,
            );
        }
    }
}
