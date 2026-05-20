<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Deals | Market Lane Store</title>

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
                    <a href="{{ route('store.collections') }}" class="rounded-lg px-3 py-2 transition hover:bg-slate-100 hover:text-emerald-700">Collections</a>
                    <a href="{{ route('store.deals') }}" class="rounded-lg bg-emerald-50 px-3 py-2 text-emerald-700">Deals</a>
                    <a href="{{ route('store.support') }}" class="rounded-lg px-3 py-2 transition hover:bg-slate-100 hover:text-emerald-700">Support</a>
                </nav>
            </div>
        </header>

        <main>
            <section class="border-b border-slate-200 bg-white">
                <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
                    <p class="text-sm font-bold uppercase tracking-wide text-emerald-700">Sale shelf</p>
                    <div class="mt-3 flex flex-col justify-between gap-4 lg:flex-row lg:items-end">
                        <div>
                            <h1 class="text-4xl font-bold tracking-normal text-slate-950">Current deals</h1>
                            <p class="mt-3 max-w-2xl text-base leading-7 text-slate-600">Products with previous prices are collected here so checkout, discount displays, and sale sorting can be tested quickly.</p>
                        </div>
                        <div class="rounded-lg border border-slate-200 bg-slate-50 px-4 py-3">
                            <p class="text-sm font-bold text-slate-500">Seeded sale products</p>
                            <p class="mt-1 text-3xl font-bold text-slate-950">{{ $dealProducts->count() }}</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($dealProducts as $product)
                        @php
                            $savings = (float) $product->previous_price - (float) $product->price;
                        @endphp

                        <article class="rounded-lg border border-slate-200 bg-white p-4 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                            <a href="{{ route('products.show', $product) }}" class="product-visual {{ $product->image_theme }}">
                                <div class="product-object">
                                    <span>{{ $product->image_label }}</span>
                                </div>
                                <span class="absolute left-3 top-3 rounded bg-amber-50 px-2 py-1 text-xs font-bold text-amber-700">Save ${{ number_format($savings, 0) }}</span>
                            </a>

                            <p class="mt-4 text-xs font-bold uppercase tracking-wide text-slate-500">{{ $product->brand }}</p>
                            <h2 class="mt-1 min-h-12 text-base font-bold leading-6 text-slate-950">
                                <a href="{{ route('products.show', $product) }}" class="transition hover:text-emerald-700">{{ $product->name }}</a>
                            </h2>
                            <div class="mt-3 flex items-baseline gap-2">
                                <p class="text-2xl font-bold tabular-nums text-slate-950">${{ number_format((float) $product->price, 2) }}</p>
                                <p class="text-sm font-bold tabular-nums text-slate-400 line-through">${{ number_format((float) $product->previous_price, 2) }}</p>
                            </div>
                            <p class="mt-2 text-sm font-semibold text-emerald-700">{{ number_format((float) $product->rating, 1) }} rating</p>
                        </article>
                    @endforeach
                </div>
            </section>
        </main>

        @modelMind
    </body>
</html>
