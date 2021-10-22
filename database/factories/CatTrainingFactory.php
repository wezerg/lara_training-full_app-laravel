<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\CatTraining;
use App\Models\Training;
use Illuminate\Database\Eloquent\Factories\Factory;

class CatTrainingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CatTraining::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'categoryId' => Category::all()->random()->id,
            'trainingId' => Training::all()->random()->id
        ];
    }
}
