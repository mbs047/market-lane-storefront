<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Collections | Market Lane Store</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-50 text-slate-950 antialiased">
        <header class="sticky top-0 z-40 border-b border-slate-200 bg-white/95 backdrop-blur">
            <div class="mx-auto flex max-w-7xl flex-col gap-4 px-4 py-4 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
                <a href="{{ route('products.index') }}" class="flex items-center gap-3">
                    <span class="flex size-10 items-center justify-center rounded-lg bg-emerald-700 text-sm font-bold text-white">ML</span>
                    <span class="text-2xl font-bold tracking-normal">Market Lane</span>
                </a>
                <nav class="flex flex-wrap items-center gap-3 text-sm font-bold text-slate-600">
                    <a href="{{ route('products.index') }}#shop" class="rounded-lg px-3 py-2 transition hover:bg-slate-100 hover:text-emerald-700">Shop</a>
                    <a href="{{ route('store.collections') }}" class="rounded-lg bg-emerald-50 px-3 py-2 text-emerald-700">Collections</a>
                    <a href="{{ route('store.deals') }}" class="rounded-lg px-3 py-2 transition hover:bg-slate-100 hover:text-emerald-700">Deals</a>
                    <a href="{{ route('store.support') }}" class="rounded-lg px-3 py-2 transition hover:bg-slate-100 hover:text-emerald-700">Support</a>
                </nav>
            </div>
        </header>

        <main>
            <section class="border-b border-slate-200 bg-white">
                <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
                    <p class="text-sm font-bold uppercase tracking-wide text-emerald-700">Browse by department</p>
                    <div class="mt-3 flex flex-col justify-between gap-4 lg:flex-row lg:items-end">
                        <div>
                            <h1 class="text-4xl font-bold tracking-normal text-slate-950">Store collections</h1>
                            <p class="mt-3 max-w-2xl text-base leading-7 text-slate-600">A storefront-style map of the seeded catalog, grouped by category with example products for every department.</p>
                        </div>
                        <a href="{{ route('products.index') }}#shop" class="inline-flex w-fit rounded-lg bg-slate-950 px-5 py-3 text-sm font-bold text-white transition hover:bg-slate-800">Back to catalog</a>
                    </div>
                </div>
            </section>

            <section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
                <div class="grid gap-5 lg:grid-cols-2">
                    @foreach ($categories as $category)
                        @php
                            $categoryProducts = ($productsByCategory[$category->id] ?? collect())->take(3);
                        @endphp

                        <article class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p class="text-sm font-bold uppercase tracking-wide text-emerald-700">{{ $category->icon ?? 'Collection' }}</p>
                                    <h2 class="mt-2 text-2xl font-bold text-slate-950">{{ $category->name }}</h2>
                                    <p class="mt-2 text-sm leading-6 text-slate-600">{{ $category->description }}</p>
                                </div>
                                <span class="rounded-lg bg-slate-100 px-3 py-2 text-sm font-bold text-slate-700">{{ $category->products_count }} items</span>
                            </div>

                            <div class="mt-5 grid gap-3 sm:grid-cols-3">
                                @foreach ($categoryProducts as $product)
                                    <a href="{{ route('products.show', $product) }}" class="rounded-lg border border-slate-200 p-3 transition hover:border-emerald-200 hover:shadow-sm">
                                        <div class="product-visual {{ $product->image_theme }} !aspect-square">
                                            <div class="product-object !h-16 !w-16 !text-[11px]">
                                                <span>{{ $product->image_label }}</span>
                                            </div>
                                        </div>
                                        <p class="mt-3 text-xs font-bold uppercase tracking-wide text-slate-500">{{ $product->brand }}</p>
                                        <h3 class="mt-1 line-clamp-2 min-h-10 text-sm font-bold leading-5 text-slate-950">{{ $product->name }}</h3>
                                        <p class="mt-2 text-sm font-bold tabular-nums text-slate-950">${{ number_format((float) $product->price, 2) }}</p>
                                    </a>
                                @endforeach
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        </main>

        @modelMind
    </body>
</html>
