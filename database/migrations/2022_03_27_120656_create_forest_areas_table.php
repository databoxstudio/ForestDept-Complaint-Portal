<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForestAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forest_areas', function (Blueprint $table) {
            $table->id();
            $table->string('villege')->nullable();
            $table->string('beat')->nullable();
            $table->string('block')->nullable();
            $table->string('district')->nullable();
            $table->string('range')->nullable();
            $table->string('division')->nullable();
            $table->enum('status',array('1','0'))->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forest_areas');
    }
}
