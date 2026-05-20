<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Simple Products</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-50 text-slate-900 antialiased">
        <main class="min-h-screen px-4 py-8 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-7xl">
                <div class="mb-8 flex flex-col gap-5 border-b border-slate-200 pb-6 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-wide text-sky-700">Product catalog</p>
                        <h1 class="mt-2 text-3xl font-bold tracking-normal text-slate-950 sm:text-4xl">Simple Products Table</h1>
                        <p class="mt-3 max-w-2xl text-base leading-7 text-slate-600">
                            A small Laravel example with seeded product data, prices, stock quantities, and inventory values.
                        </p>
                    </div>

                    <div class="grid grid-cols-2 gap-3 sm:min-w-80">
                        <div class="rounded-lg border border-slate-200 bg-white p-4 shadow-sm">
                            <p class="text-sm font-medium text-slate-500">Products</p>
                            <p class="mt-1 text-2xl font-bold text-slate-950">{{ $products->count() }}</p>
                        </div>
                        <div class="rounded-lg border border-slate-200 bg-white p-4 shadow-sm">
                            <p class="text-sm font-medium text-slate-500">Inventory value</p>
                            <p class="mt-1 text-2xl font-bold text-slate-950">${{ number_format($inventoryValue, 2) }}</p>
                        </div>
                    </div>
                </div>

                <div class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-200">
                            <thead class="bg-slate-100">
                                <tr>
                                    <th scope="col" class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-600">SKU</th>
                                    <th scope="col" class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-600">Product</th>
                                    <th scope="col" class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-600">Brand</th>
                                    <th scope="col" class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-600">Category</th>
                                    <th scope="col" class="px-5 py-3 text-right text-xs font-semibold uppercase tracking-wide text-slate-600">Price</th>
                                    <th scope="col" class="px-5 py-3 text-right text-xs font-semibold uppercase tracking-wide text-slate-600">Stock</th>
                                    <th scope="col" class="px-5 py-3 text-right text-xs font-semibold uppercase tracking-wide text-slate-600">Value</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 bg-white">
                                @foreach ($products as $product)
                                    <tr class="hover:bg-slate-50">
                                        <td class="whitespace-nowrap px-5 py-4 text-sm font-medium text-slate-500">{{ $product->sku }}</td>
                                        <td class="min-w-72 px-5 py-4 text-sm font-semibold text-slate-950">{{ $product->name }}</td>
                                        <td class="whitespace-nowrap px-5 py-4 text-sm text-slate-700">{{ $product->brand }}</td>
                                        <td class="whitespace-nowrap px-5 py-4 text-sm text-slate-700">{{ $product->category }}</td>
                                        <td class="whitespace-nowrap px-5 py-4 text-right text-sm tabular-nums text-slate-700">${{ number_format((float) $product->price, 2) }}</td>
                                        <td class="whitespace-nowrap px-5 py-4 text-right text-sm tabular-nums text-slate-700">{{ number_format($product->stock) }}</td>
                                        <td class="whitespace-nowrap px-5 py-4 text-right text-sm font-semibold tabular-nums text-slate-950">${{ number_format((float) $product->price * $product->stock, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </body>

    @modelMind
</html>
