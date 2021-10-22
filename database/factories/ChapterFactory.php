<?php

namespace Database\Factories;

use App\Models\Chapter;
use App\Models\Training;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChapterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Chapter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'time' => $this->faker->randomDigit(),
            'content' => $this->faker->sentence(254),
            'trainingId' => Training::all()->random()->id
        ];
    }
}
