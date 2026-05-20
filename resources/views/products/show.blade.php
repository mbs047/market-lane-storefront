<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $product->name }} | Market Lane Store</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-50 text-slate-950 antialiased">
        <header class="sticky top-0 z-40 border-b border-slate-200 bg-white/95 backdrop-blur">
            <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">
                <a href="{{ route('products.index') }}" class="flex items-center gap-3">
                    <span class="flex size-10 items-center justify-center rounded-lg bg-emerald-700 text-sm font-bold text-white">ML</span>
                    <span class="text-2xl font-bold tracking-normal">Market Lane</span>
                </a>

                <div class="flex items-center gap-3">
                    <a href="{{ route('products.index') }}#shop" class="rounded-lg border border-slate-200 px-4 py-2 text-sm font-bold text-slate-700 transition hover:border-emerald-200 hover:text-emerald-700">Catalog</a>
                    <span class="hidden rounded-lg bg-slate-950 px-4 py-2 text-sm font-bold text-white sm:inline-flex">
                        Cart <span class="ml-2 rounded bg-white/15 px-2" data-cart-count>0</span>
                    </span>
                </div>
            </div>
        </header>

        <main>
            @php
                $stockLabel = $product->stock <= 6 ? 'Only '.$product->stock.' left' : $product->stock.' in stock';
                $stockClass = $product->stock <= 6 ? 'bg-amber-50 text-amber-700' : 'bg-emerald-50 text-emerald-700';
                $shippingWeight = $product->shipping_weight_grams
                    ? number_format($product->shipping_weight_grams / 1000, 2).' kg'
                    : 'Not listed';
            @endphp

            <section class="border-b border-slate-200 bg-white">
                <div class="mx-auto max-w-7xl px-4 py-5 sm:px-6 lg:px-8">
                    <nav class="flex flex-wrap items-center gap-2 text-sm font-semibold text-slate-500">
                        <a href="{{ route('products.index') }}" class="transition hover:text-emerald-700">Home</a>
                        <span>/</span>
                        <a href="{{ route('products.index') }}#shop" class="transition hover:text-emerald-700">{{ $product->category }}</a>
                        <span>/</span>
                        <span class="text-slate-900">{{ $product->name }}</span>
                    </nav>
                </div>
            </section>

            <section class="bg-white">
                <div class="mx-auto grid max-w-7xl gap-8 px-4 py-8 sm:px-6 lg:grid-cols-[1fr_0.9fr] lg:px-8 lg:py-10">
                    <div class="min-w-0">
                        <div class="product-visual {{ $product->image_theme }} min-h-[24rem]">
                            <div class="product-object !h-40 !w-40 !text-xl">
                                <span class="!px-2 !text-xl">{{ $product->image_label }}</span>
                            </div>
                            @if ($product->is_new)
                                <span class="absolute left-4 top-4 rounded bg-sky-50 px-3 py-1.5 text-sm font-bold text-sky-700">New arrival</span>
                            @elseif ($product->previous_price)
                                <span class="absolute left-4 top-4 rounded bg-amber-50 px-3 py-1.5 text-sm font-bold text-amber-700">Sale</span>
                            @endif
                        </div>
                    </div>

                    <div class="flex flex-col justify-center">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="rounded bg-slate-100 px-3 py-1 text-xs font-bold uppercase tracking-wide text-slate-600">{{ $product->brand }}</span>
                            <span class="rounded px-3 py-1 text-xs font-bold {{ $stockClass }}">{{ $stockLabel }}</span>
                        </div>

                        <h1 class="mt-4 text-3xl font-bold leading-tight tracking-normal text-slate-950 sm:text-4xl">{{ $product->name }}</h1>
                        <p class="mt-4 text-base leading-7 text-slate-600">{{ $product->description ?? $product->short_description }}</p>

                        <div class="mt-6 flex flex-wrap items-end gap-3">
                            <p class="text-4xl font-bold tabular-nums text-slate-950">${{ number_format((float) $product->price, 2) }}</p>
                            @if ($product->previous_price)
                                <p class="pb-1 text-lg font-bold tabular-nums text-slate-400 line-through">${{ number_format((float) $product->previous_price, 2) }}</p>
                            @endif
                        </div>

                        <div class="mt-4 flex flex-wrap items-center gap-3 text-sm font-semibold text-slate-600">
                            <span>{{ number_format((float) $product->rating, 1) }} rating</span>
                            <span>{{ $product->review_count }} reviews</span>
                            <span>SKU {{ $product->sku }}</span>
                        </div>

                        <div class="mt-7 grid gap-3 sm:grid-cols-3">
                            <div class="rounded-lg border border-slate-200 p-4">
                                <p class="text-xs font-bold uppercase tracking-wide text-slate-500">Warranty</p>
                                <p class="mt-1 text-lg font-bold text-slate-950">{{ $product->warranty_months ? $product->warranty_months.' months' : 'Display item' }}</p>
                            </div>
                            <div class="rounded-lg border border-slate-200 p-4">
                                <p class="text-xs font-bold uppercase tracking-wide text-slate-500">Returns</p>
                                <p class="mt-1 text-lg font-bold text-slate-950">{{ $product->return_window_days }} days</p>
                            </div>
                            <div class="rounded-lg border border-slate-200 p-4">
                                <p class="text-xs font-bold uppercase tracking-wide text-slate-500">Weight</p>
                                <p class="mt-1 text-lg font-bold text-slate-950">{{ $shippingWeight }}</p>
                            </div>
                        </div>

                        <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                            <button type="button" class="rounded-lg bg-emerald-700 px-6 py-3 text-sm font-bold text-white transition hover:bg-emerald-800"
                                data-add-to-cart
                                data-id="{{ $product->id }}"
                                data-name="{{ $product->name }}"
                                data-brand="{{ $product->brand }}"
                                data-price="{{ (float) $product->price }}"
                                data-theme="{{ $product->image_theme }}"
                                data-label="{{ $product->image_label }}">
                                Add to cart
                            </button>
                            <a href="{{ route('products.index') }}#shop" class="rounded-lg border border-slate-300 bg-white px-6 py-3 text-center text-sm font-bold text-slate-800 transition hover:border-slate-400">Back to catalog</a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="border-t border-slate-200 bg-slate-50">
                <div class="mx-auto grid max-w-7xl gap-6 px-4 py-8 sm:px-6 lg:grid-cols-[1fr_24rem] lg:px-8">
                    <div class="space-y-6">
                        <div class="rounded-lg border border-slate-200 bg-white p-5">
                            <h2 class="text-xl font-bold text-slate-950">Product details</h2>
                            <p class="mt-3 text-sm leading-6 text-slate-600">{{ $product->short_description }}</p>

                            <div class="mt-5 grid gap-3 sm:grid-cols-2">
                                @foreach ($product->specifications ?? [] as $key => $value)
                                    <div class="rounded-lg bg-slate-50 px-4 py-3">
                                        <p class="text-xs font-bold uppercase tracking-wide text-slate-500">{{ ucwords(str_replace('_', ' ', $key)) }}</p>
                                        <p class="mt-1 text-sm font-bold text-slate-900">{{ is_array($value) ? implode(', ', $value) : $value }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="rounded-lg border border-slate-200 bg-white p-5">
                            <div class="flex items-center justify-between gap-4">
                                <div>
                                    <h2 class="text-xl font-bold text-slate-950">Customer reviews</h2>
                                    <p class="mt-1 text-sm font-semibold text-slate-500">{{ $product->reviews->count() }} seeded reviews for testing.</p>
                                </div>
                                <p class="text-2xl font-bold text-emerald-700">{{ number_format((float) $product->rating, 1) }}</p>
                            </div>

                            <div class="mt-5 space-y-3">
                                @forelse ($product->reviews as $review)
                                    <article class="rounded-lg border border-slate-200 p-4">
                                        <div class="flex flex-wrap items-center justify-between gap-2">
                                            <div>
                                                <h3 class="font-bold text-slate-950">{{ $review->title }}</h3>
                                                <p class="mt-1 text-xs font-semibold uppercase tracking-wide text-slate-500">
                                                    {{ $review->customer?->name ?? 'Guest customer' }}
                                                    @if ($review->is_verified)
                                                        <span class="text-emerald-700">Verified buyer</span>
                                                    @endif
                                                </p>
                                            </div>
                                            <span class="rounded bg-emerald-50 px-2 py-1 text-sm font-bold text-emerald-700">{{ $review->rating }}/5</span>
                                        </div>
                                        <p class="mt-3 text-sm leading-6 text-slate-600">{{ $review->body }}</p>
                                    </article>
                                @empty
                                    <p class="rounded-lg border border-dashed border-slate-300 p-4 text-sm font-semibold text-slate-500">No seeded reviews yet.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <aside class="space-y-6">
                        <div class="rounded-lg border border-slate-200 bg-white p-5">
                            <h2 class="text-xl font-bold text-slate-950">Testing data</h2>
                            <dl class="mt-4 space-y-3 text-sm">
                                <div class="flex justify-between gap-3">
                                    <dt class="font-semibold text-slate-500">Category</dt>
                                    <dd class="font-bold text-slate-950">{{ $product->categoryModel?->name ?? $product->category }}</dd>
                                </div>
                                <div class="flex justify-between gap-3">
                                    <dt class="font-semibold text-slate-500">Brand model</dt>
                                    <dd class="font-bold text-slate-950">{{ $product->brandModel?->name ?? $product->brand }}</dd>
                                </div>
                                <div class="flex justify-between gap-3">
                                    <dt class="font-semibold text-slate-500">Color</dt>
                                    <dd class="font-bold text-slate-950">{{ $product->color_name ?? 'Default' }}</dd>
                                </div>
                                <div class="flex justify-between gap-3">
                                    <dt class="font-semibold text-slate-500">Published</dt>
                                    <dd class="font-bold text-slate-950">{{ $product->published_at?->format('M j, Y') ?? 'Draft' }}</dd>
                                </div>
                            </dl>
                        </div>

                        <div class="rounded-lg border border-slate-200 bg-white p-5">
                            <h2 class="text-xl font-bold text-slate-950">Inventory events</h2>
                            <div class="mt-4 space-y-3">
                                @foreach ($product->inventoryMovements as $movement)
                                    <div class="rounded-lg bg-slate-50 p-3">
                                        <div class="flex items-center justify-between gap-3">
                                            <p class="text-sm font-bold text-slate-950">{{ ucfirst($movement->movement_type) }}</p>
                                            <p class="text-sm font-bold tabular-nums {{ $movement->quantity >= 0 ? 'text-emerald-700' : 'text-rose-700' }}">{{ $movement->quantity >= 0 ? '+' : '' }}{{ $movement->quantity }}</p>
                                        </div>
                                        <p class="mt-1 text-xs font-semibold text-slate-500">{{ $movement->reason }} {{ $movement->reference ? '('.$movement->reference.')' : '' }}</p>
                                        <p class="mt-1 text-xs text-slate-400">{{ $movement->occurred_at?->format('M j, Y') }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </aside>
                </div>
            </section>

            @if ($relatedProducts->isNotEmpty())
                <section class="border-t border-slate-200 bg-white">
                    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <h2 class="text-2xl font-bold tracking-normal text-slate-950">Related products</h2>
                                <p class="mt-1 text-sm text-slate-600">More items from {{ $product->categoryModel?->name ?? $product->category }}.</p>
                            </div>
                            <a href="{{ route('products.index') }}#shop" class="text-sm font-bold text-emerald-700">View all</a>
                        </div>

                        <div class="mt-5 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                            @foreach ($relatedProducts as $relatedProduct)
                                <a href="{{ route('products.show', $relatedProduct) }}" class="rounded-lg border border-slate-200 p-4 transition hover:-translate-y-0.5 hover:border-emerald-200 hover:shadow-md">
                                    <div class="product-visual {{ $relatedProduct->image_theme }} !aspect-[4/3]">
                                        <div class="product-object">
                                            <span>{{ $relatedProduct->image_label }}</span>
                                        </div>
                                    </div>
                                    <p class="mt-4 text-xs font-bold uppercase tracking-wide text-slate-500">{{ $relatedProduct->brand }}</p>
                                    <h3 class="mt-1 min-h-12 text-base font-bold leading-6 text-slate-950">{{ $relatedProduct->name }}</h3>
                                    <p class="mt-2 text-lg font-bold tabular-nums text-slate-950">${{ number_format((float) $relatedProduct->price, 2) }}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif
        </main>

        @modelMind
    </body>
</html>
