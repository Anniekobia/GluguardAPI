<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodRecommendationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_recommendations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('food_category');
            $table->string('food_name');
            $table->string('serving_size');
            $table->float('glycemic_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_recommendations');
    }
}
