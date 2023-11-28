<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testIndex()
    {
        $products = Product::factory(3)->create();

        $response = $this->get(route('product.index'));

        $response->assertStatus(200);

        $response->assertViewHas('products', $products);
    }

    public function testCreate()
    {
        $response = $this->get(route('product.create'));

        $response->assertStatus(200);
    }

    public function testEdit()
    {
        $product = Product::factory()->create();

        $response = $this->get(route('product.edit', $product->id));

        $response->assertStatus(200);

        $response->assertViewHas('product', $product);
    }

    public function testStore()
    {
        $productData = Product::factory()->make()->toArray();

        $this->withoutMiddleware();

        $response = $this->post(route('product.store'), $productData);

        $response->assertRedirect(route('product.index'));

        $this->assertDatabaseHas('products', $productData);
    }

    public function testUpdate()
    {
        $product = Product::factory()->create();

        $updatedData = [
            'price' => $this->faker->randomFloat(2, 100, 1000),
            'count' => $this->faker->randomDigit(),
            'desc' => $this->faker->text,
            'sku' => $this->faker->unique()->text(10)
        ];

        $response = $this->put(route('product.update', $product->id), $updatedData);

        $this->assertDatabaseHas('products', $updatedData);

        $response->assertStatus(302);

    }

    public function testDestroy()
    {
        $product = Product::factory()->create();

        $response = $this->delete(route('product.destroy', $product));

        $response->assertRedirect(route('product.index'));

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

}
