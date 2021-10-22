<?php

namespace Database\Factories;

use App\Models\Training;
use App\Models\Type;
use App\Models\User;
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
            'name' => $this->faker->sentence,
            'description' => $this->faker->sentence(100),
            'price' => $this->faker->randomFloat(null, 0, 1000),
            'userId' => User::all()->random()->id,
            'typeId' => Type::all()->random()->id
        ];
    }
}
