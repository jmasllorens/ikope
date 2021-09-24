<?php

namespace Database\Factories;

use App\Models\Session;
use Illuminate\Database\Eloquent\Factories\Factory;

class SessionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Session::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this ->faker->dateTimeBetween('now', '+200 days'),
            'keywords' => $this->faker->text(5),
            'cost' => $this->faker->numberBetween(20, 100),
            'isPayed' => false
            
            ];
    }
}
