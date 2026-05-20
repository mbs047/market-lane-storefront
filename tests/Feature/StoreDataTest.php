<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Customer;
use App\Models\InventoryMovement;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductReview;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreDataTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_testing_dataset_includes_related_models(): void
    {
        $this->seed(DatabaseSeeder::class);

        $this->assertSame(11, Category::query()->count());
        $this->assertGreaterThanOrEqual(50, Brand::query()->count());
        $this->assertGreaterThanOrEqual(350, Product::query()->count());
        $this->assertSame(8, Customer::query()->count());
        $this->assertSame(6, Order::query()->count());
        $this->assertSame(11, OrderItem::query()->count());
        $this->assertSame(12, ProductReview::query()->count());
        $this->assertSame(Product::query()->count() * 2, InventoryMovement::query()->count());

        $product = Product::query()
            ->where('sku', 'PRD-1001')
            ->with(['brandModel', 'categoryModel', 'reviews', 'inventoryMovements'])
            ->firstOrFail();

        $this->assertSame('Apple', $product->brandModel->name);
        $this->assertSame('Smartphones', $product->categoryModel->name);
        $this->assertGreaterThan(0, $product->reviews->count());
        $this->assertGreaterThan(0, $product->inventoryMovements->count());
    }
}
