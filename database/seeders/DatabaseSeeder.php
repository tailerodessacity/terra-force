<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(5)->create();

        $users->each(function ($user) {
            $orders = Order::factory(3)->create(['user_id' => $user->id]);

            $orders->each(function ($order) {
                $products = Product::factory(2)->create();

                $products->each(function ($product) use ($order) {
                    OrderProduct::factory()->create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                    ]);
                });
            });
        });

    }
}
