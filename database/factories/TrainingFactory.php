<?php

namespace Database\Factories;

use App\Models\Training;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Training::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'extract' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(100),
            'picture' => $this->faker->imageUrl(),
            'price' => $this->faker->randomFloat(2),
            'published_on' => $this->faker->date(),
            'user' => $this->faker->numberBetween(1,5),
        ];
    }
}
