<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = \App\Models\Order::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => Customer::factory(),
            'product_id' => Product::factory(),
            'quantity' => $this->faker->numberBetween(1, 10),
            'total_price' => function (array $attributes) {
                $product = Product::find($attributes['product_id']);
                return $product ? $product->price * $attributes['quantity'] : 0;
            },
            'status' => $this->faker->randomElement(['Em Aberto', 'Pago', 'Cancelado']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
