# Simple Products Laravel App

This is a small Laravel example app that displays a seeded products table. It uses SQLite by default, includes 20 recognizable product names, and keeps the frontend intentionally simple with Tailwind CSS.

## What is Included

- A `products` database table with SKU, name, brand, category, price, and stock columns.
- A `ProductSeeder` with 20 example product records.
- A simple home page at `/` that lists the products in a Tailwind-styled table.
- A feature test that verifies the seeded product page.

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

## Tests

```bash
php artisan test
```

The test suite uses an in-memory SQLite database.
