<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(2),
            'email' => $this->faker->unique()->safeEmail(),
            'surname' => $this->faker->name(2),
            'age' => $this->faker->numberBetween(10, 96),
            'pronoun' => 'they',
            'motive' => $this->faker->word(8),
            'history' => $this->faker->text(5000),
            'isConsulting' => true
           
            ];
    }
}
