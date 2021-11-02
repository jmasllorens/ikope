<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name' => $this ->faker->company(),
            'image' => $this->faker->imageUrl(640, 480, false),
            'price' => $this->faker->numberBetween(5, 500),
            'available' => true
            
            ];    
            

    }
}
