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

        $product = Product::query()->where('sku', 'PRD-1001')->firstOrFail();

        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertSee('Market Lane')
            ->assertSee('Shop the catalog')
            ->assertSee('Testing data included')
            ->assertSee('Apple iPhone 15 Pro 256GB')
            ->assertSee('Sony WH-1000XM5 Headphones')
            ->assertSee(route('products.show', $product))
            ->assertSee('$1,099.00');

        $this->assertGreaterThanOrEqual(200, Product::query()->count());
    }

    public function test_product_details_page_shows_product_data(): void
    {
        $this->withoutVite();
        $this->seed(DatabaseSeeder::class);

        $product = Product::query()
            ->where('sku', 'PRD-1001')
            ->with(['reviews', 'inventoryMovements'])
            ->firstOrFail();

        $response = $this->get(route('products.show', $product));

        $response
            ->assertOk()
            ->assertSee('Apple iPhone 15 Pro 256GB')
            ->assertSee('Product details')
            ->assertSee('Customer reviews')
            ->assertSee('Inventory events')
            ->assertSee('Related products')
            ->assertSee($product->short_description)
            ->assertSee($product->sku);

        $this->assertGreaterThan(0, $product->reviews->count());
        $this->assertGreaterThan(0, $product->inventoryMovements->count());
    }
}
