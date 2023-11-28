<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'price' => $this->faker->randomFloat(2, 10, 100),
            'count' => $this->faker->numberBetween(1, 100),
            'desc' => $this->faker->text,
            'sku' => $this->faker->unique()->regexify('[A-Za-z0-9]{7}'),
        ];
    }
}
