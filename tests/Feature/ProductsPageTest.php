<?php

namespace Tests\Feature;

use App\Models\Product;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductsPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_products_page_shows_seeded_products(): void
    {
        $this->withoutVite();
        $this->seed(DatabaseSeeder::class);

        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertSee('Market Lane')
            ->assertSee('Shop the catalog')
            ->assertSee('Testing data included')
            ->assertSee('Apple iPhone 15 Pro 256GB')
            ->assertSee('Sony WH-1000XM5 Headphones')
            ->assertSee('$1,099.00');

        $this->assertGreaterThanOrEqual(200, Product::query()->count());
    }
}
