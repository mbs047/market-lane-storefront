<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function __invoke(): View
    {
        $products = Product::query()
            ->orderBy('sku')
            ->get();

        $inventoryValue = $products->sum(
            fn (Product $product): float => (float) $product->price * $product->stock
        );

        return view('products.index', [
            'products' => $products,
            'inventoryValue' => $inventoryValue,
        ]);
    }
}
