<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Market Lane Store</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-white text-slate-950 antialiased">
        <header class="sticky top-0 z-40 border-b border-slate-200 bg-white/95 backdrop-blur">
            <div class="mx-auto flex max-w-7xl flex-col gap-4 px-4 py-4 sm:px-6 lg:flex-row lg:items-center lg:px-8">
                <div class="flex items-center justify-between gap-6">
                    <a href="#" class="flex items-center gap-3">
                        <span class="flex size-10 items-center justify-center rounded-lg bg-emerald-700 text-sm font-bold text-white">ML</span>
                        <span class="text-2xl font-bold tracking-normal">Market Lane</span>
                    </a>
                    <a href="#cart" class="rounded-lg border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 lg:hidden">
                        Cart <span data-cart-count>{{ $cartPreviewProducts->count() }}</span>
                    </a>
                </div>

                <nav class="hidden items-center gap-6 text-sm font-semibold text-slate-600 lg:flex">
                    <a href="#shop" class="text-emerald-700">Shop</a>
                    <a href="#categories">Categories</a>
                    <a href="#testing-data">Testing Data</a>
                </nav>

                <div class="flex flex-1 items-center gap-3 lg:ml-8">
                    <label class="sr-only" for="catalog-search">Search products</label>
                    <div class="relative flex-1">
                        <input id="catalog-search" type="search" placeholder="Search products, brands, categories..." class="w-full rounded-lg border border-slate-200 bg-white px-4 py-3 pr-12 text-sm text-slate-900 shadow-sm outline-none transition focus:border-emerald-700 focus:ring-4 focus:ring-emerald-100">
                        <span class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">
                            <svg class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="m20 20-4.4-4.4m2.4-5.1a7.5 7.5 0 1 1-15 0 7.5 7.5 0 0 1 15 0Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                            </svg>
                        </span>
                    </div>
                    <a href="#cart" class="hidden rounded-lg bg-slate-950 px-5 py-3 text-sm font-bold text-white lg:inline-flex">
                        Cart <span class="ml-2 rounded bg-white/15 px-2" data-cart-count>{{ $cartPreviewProducts->count() }}</span>
                    </a>
                </div>
            </div>
        </header>

        <main>
            <section class="border-b border-slate-200 bg-slate-50">
                <div class="mx-auto grid max-w-7xl gap-8 px-4 py-8 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:px-8 lg:py-10">
                    <div class="flex flex-col justify-center py-4">
                        <p class="text-sm font-bold uppercase tracking-wide text-emerald-700">Curated tech, home, and everyday gear</p>
                        <h1 class="mt-4 max-w-2xl text-4xl font-bold leading-tight tracking-normal text-slate-950 sm:text-5xl">
                            A real storefront built from testable Laravel data.
                        </h1>
                        <p class="mt-5 max-w-xl text-base leading-7 text-slate-600">
                            Browse seeded products, categories, brands, reviews, orders, customers, and inventory events in one compact ecommerce demo.
                        </p>

                        <div class="mt-7 flex flex-wrap gap-3">
                            <a href="#shop" class="rounded-lg bg-emerald-700 px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-emerald-800">Shop products</a>
                            <a href="#testing-data" class="rounded-lg border border-slate-300 bg-white px-5 py-3 text-sm font-bold text-slate-800 transition hover:border-slate-400">View data models</a>
                        </div>

                        <div class="mt-8 grid max-w-xl grid-cols-3 gap-3">
                            <div class="rounded-lg border border-slate-200 bg-white p-4">
                                <p class="text-2xl font-bold text-slate-950">{{ $storeStats['products'] }}</p>
                                <p class="mt-1 text-xs font-semibold uppercase tracking-wide text-slate-500">Products</p>
                            </div>
                            <div class="rounded-lg border border-slate-200 bg-white p-4">
                                <p class="text-2xl font-bold text-slate-950">{{ $storeStats['orders'] }}</p>
                                <p class="mt-1 text-xs font-semibold uppercase tracking-wide text-slate-500">Orders</p>
                            </div>
                            <div class="rounded-lg border border-slate-200 bg-white p-4">
                                <p class="text-2xl font-bold text-slate-950">{{ $storeStats['reviews'] }}</p>
                                <p class="mt-1 text-xs font-semibold uppercase tracking-wide text-slate-500">Reviews</p>
                            </div>
                        </div>
                    </div>

                    <div class="relative min-h-80 overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">
                        <img src="{{ asset('images/market-lane-hero.png') }}" alt="Curated consumer products on a white retail display" class="h-full min-h-80 w-full object-cover">
                    </div>
                </div>
            </section>

            <section class="border-b border-slate-200 bg-white">
                <div class="mx-auto grid max-w-7xl gap-4 px-4 py-5 sm:grid-cols-3 sm:px-6 lg:px-8">
                    <div class="flex items-center gap-3 rounded-lg border border-slate-200 p-4">
                        <span class="flex size-10 items-center justify-center rounded-lg bg-emerald-50 text-emerald-700">
                            <svg class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 7h11v10H4V7Zm11 3h3l2 3v4h-5v-7ZM7 19a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm10 0a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>
                        </span>
                        <div>
                            <p class="text-sm font-bold text-slate-950">Free shipping</p>
                            <p class="text-sm text-slate-500">On orders above $500</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 rounded-lg border border-slate-200 p-4">
                        <span class="flex size-10 items-center justify-center rounded-lg bg-emerald-50 text-emerald-700">
                            <svg class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3 5 6v5c0 4.5 2.8 8 7 10 4.2-2 7-5.5 7-10V6l-7-3Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="m8.8 12 2.1 2.1 4.5-4.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        <div>
                            <p class="text-sm font-bold text-slate-950">Warranty data</p>
                            <p class="text-sm text-slate-500">Stored per product</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 rounded-lg border border-slate-200 p-4">
                        <span class="flex size-10 items-center justify-center rounded-lg bg-emerald-50 text-emerald-700">
                            <svg class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M6 9H4.5A2.5 2.5 0 0 0 2 11.5v0A2.5 2.5 0 0 0 4.5 14H6m12-5h1.5A2.5 2.5 0 0 1 22 11.5v0a2.5 2.5 0 0 1-2.5 2.5H18M8 7h8v10H8V7Z" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        <div>
                            <p class="text-sm font-bold text-slate-950">Inventory logs</p>
                            <p class="text-sm text-slate-500">{{ $storeStats['inventoryMovements'] }} seeded movements</p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="shop" class="bg-slate-50">
                <div class="mx-auto grid max-w-7xl gap-6 px-4 py-8 sm:px-6 lg:grid-cols-[1fr_20rem] lg:px-8">
                    <div class="min-w-0">
                        <div id="categories" class="mb-6 flex flex-col gap-4">
                            <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
                                <div>
                                    <h2 class="text-2xl font-bold tracking-normal text-slate-950">Shop the catalog</h2>
                                    <p class="mt-1 text-sm text-slate-600">{{ $products->count() }} seeded products across {{ $categories->count() }} categories.</p>
                                </div>
                                <label class="flex items-center gap-3 text-sm font-semibold text-slate-600">
                                    Sort
                                    <select data-sort-select class="rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800 shadow-sm">
                                        <option value="featured">Featured first</option>
                                        <option value="price-asc">Price: low to high</option>
                                        <option value="price-desc">Price: high to low</option>
                                        <option value="rating-desc">Top rated</option>
                                        <option value="stock-desc">Most stock</option>
                                    </select>
                                </label>
                            </div>

                            <div class="flex max-w-full gap-2 overflow-x-auto pb-1">
                                <button type="button" class="category-filter is-active" data-category-filter="all">All categories</button>
                                @foreach ($categories as $category)
                                    <button type="button" class="category-filter" data-category-filter="{{ $category->slug }}">
                                        {{ $category->name }}
                                        <span>{{ $category->products_count }}</span>
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3" data-products-grid>
                            @foreach ($products as $product)
                                @php
                                    $categorySlug = $product->categoryModel?->slug ?? \Illuminate\Support\Str::slug($product->category);
                                    $specifications = array_slice($product->specifications ?? [], 0, 2, true);
                                    $stockLabel = $product->stock <= 6 ? 'Only '.$product->stock.' left' : 'In stock';
                                    $stockClass = $product->stock <= 6 ? 'text-amber-700 bg-amber-50' : 'text-emerald-700 bg-emerald-50';
                                @endphp

                                <article class="product-card rounded-lg border border-slate-200 bg-white p-4 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md"
                                    data-product-card
                                    data-name="{{ strtolower($product->name.' '.$product->brand.' '.$product->category.' '.$product->short_description) }}"
                                    data-category="{{ $categorySlug }}"
                                    data-price="{{ (float) $product->price }}"
                                    data-rating="{{ (float) $product->rating }}"
                                    data-stock="{{ $product->stock }}"
                                    data-featured="{{ $product->is_featured ? 1 : 0 }}">
                                    <div class="product-visual {{ $product->image_theme }}">
                                        <div class="product-object">
                                            <span>{{ $product->image_label }}</span>
                                        </div>
                                        @if ($product->is_new)
                                            <span class="absolute left-3 top-3 rounded bg-sky-50 px-2 py-1 text-xs font-bold text-sky-700">New</span>
                                        @elseif ($product->previous_price)
                                            <span class="absolute left-3 top-3 rounded bg-amber-50 px-2 py-1 text-xs font-bold text-amber-700">Deal</span>
                                        @endif
                                    </div>

                                    <div class="mt-4 flex items-start justify-between gap-3">
                                        <div>
                                            <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">{{ $product->brand }}</p>
                                            <h3 class="mt-1 min-h-12 text-base font-bold leading-6 text-slate-950">{{ $product->name }}</h3>
                                        </div>
                                        <button type="button" class="rounded-lg border border-slate-200 p-2 text-slate-500 transition hover:border-emerald-200 hover:text-emerald-700" aria-label="Save {{ $product->name }}">
                                            <svg class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 20s-7-4.6-7-10.2A4 4 0 0 1 12 7a4 4 0 0 1 7 2.8C19 15.4 12 20 12 20Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>
                                        </button>
                                    </div>

                                    <p class="mt-3 line-clamp-2 min-h-11 text-sm leading-6 text-slate-600">{{ $product->short_description }}</p>

                                    <div class="mt-4 flex items-center justify-between gap-3 text-sm">
                                        <span class="font-semibold text-slate-700">{{ $product->category }}</span>
                                        <span class="rounded px-2 py-1 text-xs font-bold {{ $stockClass }}">{{ $stockLabel }}</span>
                                    </div>

                                    <div class="mt-4 flex items-end justify-between gap-3">
                                        <div>
                                            <div class="flex items-baseline gap-2">
                                                <p class="text-2xl font-bold tabular-nums text-slate-950">${{ number_format((float) $product->price, 2) }}</p>
                                                @if ($product->previous_price)
                                                    <p class="text-sm font-semibold tabular-nums text-slate-400 line-through">${{ number_format((float) $product->previous_price, 2) }}</p>
                                                @endif
                                            </div>
                                            <p class="mt-1 text-xs font-semibold text-slate-500">{{ number_format((float) $product->rating, 1) }} rating, {{ $product->review_count }} reviews</p>
                                        </div>
                                    </div>

                                    <div class="mt-4 grid grid-cols-2 gap-2">
                                        @foreach ($specifications as $key => $value)
                                            <div class="rounded-lg bg-slate-50 px-3 py-2">
                                                <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">{{ ucwords(str_replace('_', ' ', $key)) }}</p>
                                                <p class="mt-1 text-sm font-bold text-slate-800">{{ $value }}</p>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="mt-4 flex gap-2 text-xs font-semibold text-slate-500">
                                        <span>{{ $product->warranty_months ? $product->warranty_months.' mo warranty' : 'Display item' }}</span>
                                        <span>Return {{ $product->return_window_days }} days</span>
                                    </div>

                                    <button type="button" class="mt-4 w-full rounded-lg bg-emerald-700 px-4 py-3 text-sm font-bold text-white transition hover:bg-emerald-800"
                                        data-add-to-cart
                                        data-id="{{ $product->id }}"
                                        data-name="{{ $product->name }}"
                                        data-brand="{{ $product->brand }}"
                                        data-price="{{ (float) $product->price }}"
                                        data-theme="{{ $product->image_theme }}"
                                        data-label="{{ $product->image_label }}">
                                        Add to cart
                                    </button>
                                </article>
                            @endforeach
                        </div>

                        <div class="hidden rounded-lg border border-slate-200 bg-white p-8 text-center" data-empty-state>
                            <p class="text-lg font-bold text-slate-950">No products found</p>
                            <p class="mt-2 text-sm text-slate-500">Try a different category, search term, or sort option.</p>
                        </div>
                    </div>

                    <aside id="cart" class="h-fit rounded-lg border border-slate-200 bg-white p-5 shadow-sm lg:sticky lg:top-28">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-xl font-bold text-slate-950">Cart</h2>
                                <p class="text-sm text-slate-500"><span data-cart-count>{{ $cartPreviewProducts->count() }}</span> selected items</p>
                            </div>
                            <button type="button" class="text-sm font-bold text-slate-500 transition hover:text-slate-900" data-clear-cart>Clear</button>
                        </div>

                        <div class="mt-5 space-y-3" data-cart-items></div>

                        <div class="mt-5 border-t border-slate-200 pt-5">
                            <div class="flex justify-between text-sm text-slate-600">
                                <span>Subtotal</span>
                                <span data-cart-subtotal>$0.00</span>
                            </div>
                            <div class="mt-2 flex justify-between text-sm text-slate-600">
                                <span>Tax estimate</span>
                                <span data-cart-tax>$0.00</span>
                            </div>
                            <div class="mt-2 flex justify-between text-sm text-slate-600">
                                <span>Shipping</span>
                                <span data-cart-shipping>Free</span>
                            </div>
                            <div class="mt-4 flex justify-between text-lg font-bold text-slate-950">
                                <span>Total</span>
                                <span data-cart-total>$0.00</span>
                            </div>
                        </div>

                        <button type="button" class="mt-5 w-full rounded-lg bg-slate-950 px-4 py-3 text-sm font-bold text-white transition hover:bg-slate-800">Checkout</button>

                        <script type="application/json" data-initial-cart>
                            {!! $cartPreviewProducts->map(fn ($product) => [
                                'id' => $product->id,
                                'name' => $product->name,
                                'brand' => $product->brand,
                                'price' => (float) $product->price,
                                'theme' => $product->image_theme,
                                'label' => $product->image_label,
                                'quantity' => 1,
                            ])->values()->toJson() !!}
                        </script>
                    </aside>
                </div>
            </section>

            <section id="testing-data" class="border-t border-slate-200 bg-white">
                <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
                    <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
                        <div>
                            <h2 class="text-2xl font-bold tracking-normal text-slate-950">Testing data included</h2>
                            <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-600">
                                The app includes a fuller relational ecommerce dataset so model queries, storefront filtering, summaries, and assistant context can be tested against realistic records.
                            </p>
                        </div>
                        <p class="text-sm font-bold text-emerald-700">Seeded revenue: ${{ number_format($storeStats['orderRevenue'], 2) }}</p>
                    </div>

                    <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-6">
                        <div class="rounded-lg border border-slate-200 p-4">
                            <p class="text-2xl font-bold">{{ $storeStats['categories'] }}</p>
                            <p class="mt-1 text-sm font-semibold text-slate-500">Categories</p>
                        </div>
                        <div class="rounded-lg border border-slate-200 p-4">
                            <p class="text-2xl font-bold">{{ $storeStats['products'] }}</p>
                            <p class="mt-1 text-sm font-semibold text-slate-500">Products</p>
                        </div>
                        <div class="rounded-lg border border-slate-200 p-4">
                            <p class="text-2xl font-bold">{{ $storeStats['customers'] }}</p>
                            <p class="mt-1 text-sm font-semibold text-slate-500">Customers</p>
                        </div>
                        <div class="rounded-lg border border-slate-200 p-4">
                            <p class="text-2xl font-bold">{{ $storeStats['orders'] }}</p>
                            <p class="mt-1 text-sm font-semibold text-slate-500">Orders</p>
                        </div>
                        <div class="rounded-lg border border-slate-200 p-4">
                            <p class="text-2xl font-bold">{{ $storeStats['reviews'] }}</p>
                            <p class="mt-1 text-sm font-semibold text-slate-500">Reviews</p>
                        </div>
                        <div class="rounded-lg border border-slate-200 p-4">
                            <p class="text-2xl font-bold">{{ $storeStats['inventoryMovements'] }}</p>
                            <p class="mt-1 text-sm font-semibold text-slate-500">Inventory logs</p>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        @modelMind
    </body>
</html>
