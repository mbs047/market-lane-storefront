<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\InventoryMovement;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Database\Seeder;

class StoreActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::query()->get()->keyBy('sku');
        $customers = Customer::query()->get()->keyBy('email');

        $this->seedInventoryMovements($products);
        $this->seedReviews($products, $customers);
        $this->seedOrders($products, $customers);
    }

    private function seedInventoryMovements($products): void
    {
        foreach ($products as $product) {
            InventoryMovement::query()->updateOrCreate(
                [
                    'product_id' => $product->id,
                    'movement_type' => 'initial_stock',
                    'reference' => 'SEED-'.$product->sku,
                ],
                [
                    'quantity' => $product->stock,
                    'reason' => 'Initial testing inventory load',
                    'occurred_at' => now()->subDays(14),
                ],
            );

            InventoryMovement::query()->updateOrCreate(
                [
                    'product_id' => $product->id,
                    'movement_type' => 'reserved',
                    'reference' => 'WEB-CART-'.$product->sku,
                ],
                [
                    'quantity' => -min(2, max(1, (int) floor($product->stock / 8))),
                    'reason' => 'Sample cart reservation for testing',
                    'occurred_at' => now()->subDays(2),
                ],
            );
        }
    }

    private function seedReviews($products, $customers): void
    {
        $reviews = [
            ['sku' => 'PRD-1001', 'email' => 'mariam@example.com', 'rating' => 5, 'title' => 'Excellent daily phone', 'body' => 'Fast, premium, and the camera quality is excellent for travel photos.'],
            ['sku' => 'PRD-1001', 'email' => 'omar@example.com', 'rating' => 5, 'title' => 'Worth the upgrade', 'body' => 'The titanium finish feels lighter than expected and battery life is strong.'],
            ['sku' => 'PRD-1003', 'email' => 'sara@example.com', 'rating' => 5, 'title' => 'Quiet flights', 'body' => 'Noise cancellation is the best part. It makes long flights much easier.'],
            ['sku' => 'PRD-1004', 'email' => 'aisha@example.com', 'rating' => 5, 'title' => 'Great for university work', 'body' => 'Lightweight, silent, and fast enough for assignments and presentations.'],
            ['sku' => 'PRD-1006', 'email' => 'hamdan@example.com', 'rating' => 5, 'title' => 'Family favorite', 'body' => 'The OLED screen looks great and setup was simple.'],
            ['sku' => 'PRD-1007', 'email' => 'noora@example.com', 'rating' => 4, 'title' => 'Reliable earbuds', 'body' => 'Comfortable for calls and commuting, with useful transparency mode.'],
            ['sku' => 'PRD-1008', 'email' => 'khalid@example.com', 'rating' => 4, 'title' => 'Bright picture', 'body' => 'Good color and easy streaming app setup for the living room.'],
            ['sku' => 'PRD-1012', 'email' => 'yousef@example.com', 'rating' => 5, 'title' => 'Best office mouse', 'body' => 'The scroll wheel and multi-device switching are perfect for work.'],
            ['sku' => 'PRD-1013', 'email' => 'omar@example.com', 'rating' => 5, 'title' => 'Fast loading', 'body' => 'Games load quickly and the controller feels excellent.'],
            ['sku' => 'PRD-1015', 'email' => 'mariam@example.com', 'rating' => 4, 'title' => 'Powerful vacuum', 'body' => 'Expensive, but the dust detection is useful and suction is strong.'],
            ['sku' => 'PRD-1018', 'email' => 'sara@example.com', 'rating' => 4, 'title' => 'Useful training data', 'body' => 'The screen is clear and the running metrics are easy to understand.'],
            ['sku' => 'PRD-1020', 'email' => 'aisha@example.com', 'rating' => 5, 'title' => 'Beautiful display set', 'body' => 'Relaxing to build and looks great on a desk.'],
        ];

        foreach ($reviews as $index => $review) {
            $product = $products[$review['sku']] ?? null;
            $customer = $customers[$review['email']] ?? null;

            if (! $product || ! $customer) {
                continue;
            }

            ProductReview::query()->updateOrCreate(
                [
                    'product_id' => $product->id,
                    'customer_id' => $customer->id,
                    'title' => $review['title'],
                ],
                [
                    'rating' => $review['rating'],
                    'body' => $review['body'],
                    'is_verified' => true,
                    'reviewed_at' => now()->subDays(5 + ($index * 4)),
                ],
            );
        }
    }

    private function seedOrders($products, $customers): void
    {
        $orders = [
            [
                'order_number' => 'ML-10001',
                'email' => 'mariam@example.com',
                'status' => 'delivered',
                'payment_method' => 'Visa ending 4242',
                'fulfillment_method' => 'Standard delivery',
                'placed_at' => now()->subDays(15),
                'items' => [['sku' => 'PRD-1001', 'quantity' => 1], ['sku' => 'PRD-1007', 'quantity' => 1]],
            ],
            [
                'order_number' => 'ML-10002',
                'email' => 'omar@example.com',
                'status' => 'processing',
                'payment_method' => 'Apple Pay',
                'fulfillment_method' => 'Express delivery',
                'placed_at' => now()->subDays(2),
                'items' => [['sku' => 'PRD-1013', 'quantity' => 1], ['sku' => 'PRD-1012', 'quantity' => 1]],
            ],
            [
                'order_number' => 'ML-10003',
                'email' => 'sara@example.com',
                'status' => 'shipped',
                'payment_method' => 'Mastercard ending 1881',
                'fulfillment_method' => 'Standard delivery',
                'placed_at' => now()->subDays(6),
                'items' => [['sku' => 'PRD-1003', 'quantity' => 1], ['sku' => 'PRD-1018', 'quantity' => 1]],
            ],
            [
                'order_number' => 'ML-10004',
                'email' => 'aisha@example.com',
                'status' => 'delivered',
                'payment_method' => 'PayPal',
                'fulfillment_method' => 'Store pickup',
                'placed_at' => now()->subDays(21),
                'items' => [['sku' => 'PRD-1004', 'quantity' => 1], ['sku' => 'PRD-1020', 'quantity' => 2]],
            ],
            [
                'order_number' => 'ML-10005',
                'email' => 'khalid@example.com',
                'status' => 'cancelled',
                'payment_method' => 'Visa ending 9911',
                'fulfillment_method' => 'Standard delivery',
                'placed_at' => now()->subDays(9),
                'items' => [['sku' => 'PRD-1008', 'quantity' => 1]],
            ],
            [
                'order_number' => 'ML-10006',
                'email' => 'noora@example.com',
                'status' => 'paid',
                'payment_method' => 'Cash on delivery',
                'fulfillment_method' => 'Express delivery',
                'placed_at' => now()->subDay(),
                'items' => [['sku' => 'PRD-1016', 'quantity' => 1], ['sku' => 'PRD-1017', 'quantity' => 1]],
            ],
        ];

        foreach ($orders as $orderData) {
            $customer = $customers[$orderData['email']] ?? null;

            if (! $customer) {
                continue;
            }

            $lineItems = collect($orderData['items'])->map(function (array $item) use ($products): array {
                $product = $products[$item['sku']];
                $quantity = $item['quantity'];
                $lineTotal = (float) $product->price * $quantity;

                return [
                    'product' => $product,
                    'quantity' => $quantity,
                    'line_total' => $lineTotal,
                ];
            });

            $subtotal = $lineItems->sum('line_total');
            $discount = $subtotal > 1000 ? round($subtotal * 0.05, 2) : 0.00;
            $shipping = $subtotal > 500 ? 0.00 : 25.00;
            $tax = round(($subtotal - $discount) * 0.05, 2);
            $grandTotal = round($subtotal - $discount + $shipping + $tax, 2);

            $order = Order::query()->updateOrCreate(
                ['order_number' => $orderData['order_number']],
                [
                    'customer_id' => $customer->id,
                    'status' => $orderData['status'],
                    'subtotal' => $subtotal,
                    'tax_total' => $tax,
                    'shipping_total' => $shipping,
                    'discount_total' => $discount,
                    'grand_total' => $grandTotal,
                    'payment_method' => $orderData['payment_method'],
                    'fulfillment_method' => $orderData['fulfillment_method'],
                    'placed_at' => $orderData['placed_at'],
                    'notes' => 'Seeded order for storefront and model testing.',
                ],
            );

            $order->items()->delete();

            foreach ($lineItems as $lineItem) {
                $product = $lineItem['product'];

                $order->items()->create([
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'product_sku' => $product->sku,
                    'quantity' => $lineItem['quantity'],
                    'unit_price' => $product->price,
                    'discount_amount' => 0,
                    'line_total' => $lineItem['line_total'],
                ]);
            }
        }
    }
}
