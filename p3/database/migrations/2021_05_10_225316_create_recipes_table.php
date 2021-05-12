<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('slug');
            $table->string('title');
            $table->string('pic_url')->nullable(); 
            $table->string('source_url');
            $table->string('author');
            $table->tinyInteger('yield');
            $table->smallInteger('calorie')->nullable();
            $table->tinyInteger('prep_time')->nullable();
            $table->smallInteger('cook_time')->nullable();
            $table->smallInteger('total_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}