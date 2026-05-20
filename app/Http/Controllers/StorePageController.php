<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class StorePageController extends Controller
{
    public function collections(): View
    {
        $categories = Category::query()
            ->withCount(['products' => fn ($query) => $query->where('is_active', true)])
            ->where('is_active', true)
            ->orderBy('display_order')
            ->get();

        $productsByCategory = Product::query()
            ->with(['brandModel', 'categoryModel'])
            ->where('is_active', true)
            ->orderByDesc('is_featured')
            ->orderByDesc('rating')
            ->get()
            ->groupBy('category_id');

        return view('store.collections', [
            'categories' => $categories,
            'productsByCategory' => $productsByCategory,
        ]);
    }

    public function deals(): View
    {
        $dealProducts = Product::query()
            ->with(['brandModel', 'categoryModel'])
            ->where('is_active', true)
            ->whereNotNull('previous_price')
            ->get()
            ->sortByDesc(fn (Product $product): float => (float) $product->previous_price - (float) $product->price)
            ->values();

        return view('store.deals', [
            'dealProducts' => $dealProducts,
        ]);
    }

    public function support(): View
    {
        return view('store.support', [
            'storeStats' => [
                'products' => Product::query()->where('is_active', true)->count(),
                'categories' => Category::query()->where('is_active', true)->count(),
                'deals' => Product::query()->where('is_active', true)->whereNotNull('previous_price')->count(),
            ],
        ]);
    }
}
