<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique(); 
            $table->string('contact_number')->nullable();
            $table->string('full_name')->nullable();
            $table->enum('keep_identity_concealed',array('1','0'))->default('0');
            $table->string('villege')->nullable();
            $table->string('beat')->nullable();
            $table->string('block')->nullable(); 
            $table->string('district')->nullable(); 
            $table->string('range')->nullable(); 
            $table->string('division')->nullable();
            $table->string('complaint')->nullable(); 
            $table->string('information')->nullable();
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
        Schema::dropIfExists('complaints');
    }
}
