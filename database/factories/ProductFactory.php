<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
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
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->text,
            'quantity_per_unit' => $this->faker->words(3, true),
            'unit_price' => $this->faker->randomFloat(2, 10, 300),
            'units_in_stock' => rand(5, 200),
            'units_on_order' => $this->faker->optional(20, 0)->numberBetween(1, 5),
            'image' => $this->faker->imageUrl(600, 600),
        ];
    }
}
