<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product = Product::factory()->create();
        
        return [
            'order_id' => Order::factory(),
            'product_name' => $product->name,
            'product_price' => $product->price,
            'quantity' => fake()->numberBetween(1, 20),
        ];
    }
}