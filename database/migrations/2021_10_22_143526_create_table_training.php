<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTraining extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->float('price');
            $table->string('image')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('userId')->index()->nullable();
            $table->unsignedBigInteger('typeId')->index()->nullable();
            $table->foreign('userId')->references('id')->on('user')->onDelete('set null');
            $table->foreign('typeId')->references('id')->on('type')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training');
    }
}
