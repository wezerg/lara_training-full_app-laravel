<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCatTraining extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_training', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoryId')->index();
            $table->unsignedBigInteger('trainingId')->index();
            $table->foreign('categoryId')->references('id')->on('category')->onDelete('CASCADE');
            $table->foreign('trainingId')->references('id')->on('training')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_training');
    }
}
