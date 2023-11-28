<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Product>
 */
class OrderProductFactory extends Factory
{
    protected $model = OrderProduct::class;

    public function definition()
    {
        $order = Order::factory()->create();
        $product = Product::factory()->create();

        return [
            'order_id' => $order->id,
            'product_id' => $product->id,
        ];
    }
}
