<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('brand_id')->nullable()->constrained()->nullOnDelete();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('image_label')->nullable();
            $table->string('image_theme')->nullable();
            $table->string('color_name')->nullable();
            $table->decimal('previous_price', 10, 2)->nullable();
            $table->decimal('rating', 3, 2)->default(0);
            $table->unsignedInteger('review_count')->default(0);
            $table->boolean('is_featured')->default(false)->index();
            $table->boolean('is_new')->default(false);
            $table->boolean('is_active')->default(true)->index();
            $table->unsignedInteger('shipping_weight_grams')->nullable();
            $table->unsignedSmallInteger('warranty_months')->nullable();
            $table->unsignedSmallInteger('return_window_days')->default(30);
            $table->json('specifications')->nullable();
            $table->timestamp('published_at')->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['brand_id']);
            $table->dropColumn([
                'category_id',
                'brand_id',
                'short_description',
                'description',
                'image_label',
                'image_theme',
                'color_name',
                'previous_price',
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
            ]);
        });
    }
};
