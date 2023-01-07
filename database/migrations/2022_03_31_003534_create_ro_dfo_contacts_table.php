<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoDfoContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ro_dfo_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('range_name');
            $table->string('ro_name');
            $table->string('ro_contact');
            $table->string('division_name');
            $table->string('dfo_name');
            $table->string('dfo_contact');
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
        Schema::dropIfExists('ro_dfo_contacts');
    }
}
