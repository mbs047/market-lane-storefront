<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Support | Market Lane Store</title>

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
                    <a href="{{ route('store.deals') }}" class="rounded-lg px-3 py-2 transition hover:bg-slate-100 hover:text-emerald-700">Deals</a>
                    <a href="{{ route('store.support') }}" class="rounded-lg bg-emerald-50 px-3 py-2 text-emerald-700">Support</a>
                </nav>
            </div>
        </header>

        <main>
            <section class="border-b border-slate-200 bg-white">
                <div class="mx-auto grid max-w-7xl gap-8 px-4 py-10 sm:px-6 lg:grid-cols-[1fr_24rem] lg:px-8">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-wide text-emerald-700">Store help desk</p>
                        <h1 class="mt-3 text-4xl font-bold tracking-normal text-slate-950">Support, shipping, and returns</h1>
                        <p class="mt-4 max-w-2xl text-base leading-7 text-slate-600">A sample customer-service page for testing common ecommerce content: shipping rules, returns, warranty copy, and contact cards.</p>
                    </div>
                    <div class="grid grid-cols-3 gap-3">
                        <div class="rounded-lg border border-slate-200 bg-slate-50 p-4">
                            <p class="text-2xl font-bold">{{ $storeStats['products'] }}</p>
                            <p class="mt-1 text-xs font-bold uppercase tracking-wide text-slate-500">Products</p>
                        </div>
                        <div class="rounded-lg border border-slate-200 bg-slate-50 p-4">
                            <p class="text-2xl font-bold">{{ $storeStats['categories'] }}</p>
                            <p class="mt-1 text-xs font-bold uppercase tracking-wide text-slate-500">Categories</p>
                        </div>
                        <div class="rounded-lg border border-slate-200 bg-slate-50 p-4">
                            <p class="text-2xl font-bold">{{ $storeStats['deals'] }}</p>
                            <p class="mt-1 text-xs font-bold uppercase tracking-wide text-slate-500">Deals</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
                <div class="grid gap-5 lg:grid-cols-3">
                    <article class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
                        <p class="text-sm font-bold uppercase tracking-wide text-emerald-700">Shipping</p>
                        <h2 class="mt-2 text-2xl font-bold text-slate-950">Fast delivery rules</h2>
                        <p class="mt-3 text-sm leading-6 text-slate-600">Free shipping is shown on orders above $500. Smaller carts use a seeded flat-rate estimate so cart totals and checkout summaries are easy to test.</p>
                    </article>
                    <article class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
                        <p class="text-sm font-bold uppercase tracking-wide text-emerald-700">Returns</p>
                        <h2 class="mt-2 text-2xl font-bold text-slate-950">30-day window</h2>
                        <p class="mt-3 text-sm leading-6 text-slate-600">Most products use a 30-day return window, while product details also expose warranty metadata for model and storefront testing.</p>
                    </article>
                    <article class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
                        <p class="text-sm font-bold uppercase tracking-wide text-emerald-700">Contact</p>
                        <h2 class="mt-2 text-2xl font-bold text-slate-950">Sample service team</h2>
                        <p class="mt-3 text-sm leading-6 text-slate-600">Use this page for testing support copy, assistant answers, static policy pages, and navigation between store-style content pages.</p>
                    </article>
                </div>

                <div class="mt-6 rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
                    <h2 class="text-2xl font-bold text-slate-950">Common questions</h2>
                    <div class="mt-5 grid gap-4 md:grid-cols-2">
                        <div class="rounded-lg bg-slate-50 p-4">
                            <h3 class="font-bold text-slate-950">Can I test cart totals?</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-600">Yes. Add products from the catalog and the client-side cart calculates subtotal, tax, shipping, and total.</p>
                        </div>
                        <div class="rounded-lg bg-slate-50 p-4">
                            <h3 class="font-bold text-slate-950">Where are sale items?</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-600">The Deals page lists products with previous prices, including calculated savings labels.</p>
                        </div>
                        <div class="rounded-lg bg-slate-50 p-4">
                            <h3 class="font-bold text-slate-950">Is the data relational?</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-600">Yes. Products connect to brands, categories, reviews, inventory events, and seeded order items.</p>
                        </div>
                        <div class="rounded-lg bg-slate-50 p-4">
                            <h3 class="font-bold text-slate-950">Can Model Mind use these pages?</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-600">The assistant remains available across the storefront, including these store-style pages.</p>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        @modelMind
    </body>
</html>
