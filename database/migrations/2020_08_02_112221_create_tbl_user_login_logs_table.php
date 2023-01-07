<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblUserLoginLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_login_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('warehouse_id');
            $table->integer('collected_package');
            $table->integer('c_returned_package');
            $table->integer('delivered_package');
            $table->string('login_time');
            $table->string('login_date');
            $table->string('logout_time');
            $table->string('logout_date');
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
        Schema::dropIfExists('tbl_user_login_logs');
    }
}
