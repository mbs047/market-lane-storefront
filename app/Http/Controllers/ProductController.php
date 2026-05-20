<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\InventoryMovement;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::query()
            ->with(['brandModel', 'categoryModel'])
            ->where('is_active', true)
            ->orderBy('sku')
            ->get();

        $inventoryValue = $products->sum(
            fn (Product $product): float => (float) $product->price * $product->stock
        );

        $categories = Category::query()
            ->withCount(['products' => fn ($query) => $query->where('is_active', true)])
            ->where('is_active', true)
            ->orderBy('display_order')
            ->get();

        $featuredProduct = $products->firstWhere('is_featured', true) ?? $products->first();
        $cartPreviewProducts = $products
            ->where('is_featured', true)
            ->take(3)
            ->values();

        return view('products.index', [
            'products' => $products,
            'categories' => $categories,
            'featuredProduct' => $featuredProduct,
            'cartPreviewProducts' => $cartPreviewProducts,
            'inventoryValue' => $inventoryValue,
            'storeStats' => [
                'products' => $products->count(),
                'categories' => $categories->count(),
                'customers' => Customer::query()->count(),
                'orders' => Order::query()->count(),
                'reviews' => ProductReview::query()->count(),
                'inventoryMovements' => InventoryMovement::query()->count(),
                'orderRevenue' => (float) Order::query()->where('status', '!=', 'cancelled')->sum('grand_total'),
            ],
        ]);
    }

    public function show(Product $product): View
    {
        $product->load([
            'brandModel',
            'categoryModel',
            'inventoryMovements' => fn ($query) => $query->latest('occurred_at')->limit(8),
            'reviews' => fn ($query) => $query->with('customer')->latest('reviewed_at'),
        ]);

        $relatedProducts = Product::query()
            ->with(['brandModel', 'categoryModel'])
            ->where('is_active', true)
            ->whereKeyNot($product->getKey())
            ->when($product->category_id, fn ($query) => $query->where('category_id', $product->category_id))
            ->orderByDesc('is_featured')
            ->orderByDesc('rating')
            ->limit(4)
            ->get();

        return view('products.show', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }
}
