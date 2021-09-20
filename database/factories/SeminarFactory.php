<?php

namespace Database\Factories;

use App\Models\Seminar;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeminarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Seminar::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(5),
            'author' => $this->faker->name(),
            'subject' => $this->faker->text(5),
            'approach' => $this->faker->text(20),
            'description' => $this->faker->text(1000),
            'availability' => $this -> faker -> numberBetween(5, 30),
            'date' => $this -> faker -> dateTimeBetween('now', '+200 days'),
            'image' => $this->faker->imageurl(640,480, null, false),  
            ];
    }
}
