# Market Lane Laravel Storefront

Market Lane is a simple Laravel storefront built for testing. It uses SQLite by default, ships with realistic seeded ecommerce data, and renders a Tailwind CSS store experience with product cards, category filters, search, sorting, a cart preview, and Model Mind integration.

## What is Included

- 20 seeded products with real product names, prices, stock, ratings, descriptions, specifications, warranty data, and storefront display metadata.
- Related test models for `Category`, `Brand`, `Customer`, `Order`, `OrderItem`, `ProductReview`, and `InventoryMovement`.
- Seeded sample orders, reviews, customers, and inventory events for testing data relationships.
- A public storefront at `/` with category filtering, search, sorting, product cards, and a client-side cart preview.
- Feature tests covering the storefront page and the seeded relational data.

## Setup

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm run dev
php artisan serve
```

Then open the local URL from `php artisan serve`.

For production-style frontend assets:

```bash
npm run build
```

## Tests

```bash
php artisan test
```

The test suite uses an in-memory SQLite database.

## Main Seeders

- `CategorySeeder`
- `BrandSeeder`
- `ProductSeeder`
- `CustomerSeeder`
- `StoreActivitySeeder`

Run all seeders through:

```bash
php artisan migrate:fresh --seed
```
