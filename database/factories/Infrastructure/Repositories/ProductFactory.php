<?php

namespace Database\Factories\Infrastructure\Repositories;

use App\Infrastructure\Repositories\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'price' => \rand(0, 1000000),
            'quantity' => \rand(0, 9999)
        ];
    }
}
