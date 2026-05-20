<?php

namespace Tests\Feature;

use App\Models\Product;
use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductsPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_products_page_shows_seeded_products(): void
    {
        $this->withoutVite();
        $this->seed(ProductSeeder::class);

        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertSee('Simple Products Table')
            ->assertSee('Apple iPhone 15 Pro 256GB')
            ->assertSee('Sony WH-1000XM5 Headphones')
            ->assertSee('$1,099.00');

        $this->assertSame(20, Product::query()->count());
    }
}
