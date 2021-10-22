<?php

namespace Database\Seeders;

use App\Models\CatTraining;
use Illuminate\Database\Seeder;

class CatTrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatTraining::factory()->count(20)->create();
    }
}
