<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $storeId = Store::inRandomOrder()->value('id') ?? Store::factory()->create()->id;
        $categoryId = Category::where('store_id', $storeId)->inRandomOrder()->value('id') ?? Category::factory()->create(['store_id' => $storeId])->id;

        return [
            'store_id' => $storeId,
            'category_id' => $categoryId,
            'name' => fake()->name(),
            'slug' => fake()->unique()->slug(),
            'description' => fake()->text(),
            'price' => fake()->randomFloat(2, 5, 500),
            'stock' => fake()->numberBetween(1, 99),
            'sku' => fake()->numberBetween(100000, 999999),
            'image' => null,
            'is_active' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
