<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'brand_id',
        'sku',
        'name',
        'brand',
        'category',
        'short_description',
        'description',
        'image_label',
        'image_theme',
        'color_name',
        'price',
        'previous_price',
        'stock',
        'rating',
        'review_count',
        'is_featured',
        'is_new',
        'is_active',
        'shipping_weight_grams',
        'warranty_months',
        'return_window_days',
        'specifications',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'previous_price' => 'decimal:2',
            'stock' => 'integer',
            'rating' => 'decimal:2',
            'review_count' => 'integer',
            'is_featured' => 'boolean',
            'is_new' => 'boolean',
            'is_active' => 'boolean',
            'shipping_weight_grams' => 'integer',
            'warranty_months' => 'integer',
            'return_window_days' => 'integer',
            'specifications' => 'array',
            'published_at' => 'datetime',
        ];
    }

    public function categoryModel(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brandModel(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(ProductReview::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function inventoryMovements(): HasMany
    {
        return $this->hasMany(InventoryMovement::class);
    }
}
