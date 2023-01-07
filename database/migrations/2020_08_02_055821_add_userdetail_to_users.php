<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserdetailToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name'); 
            $table->string('last_name');
            $table->string('fathers_name');
            $table->string('dob');
            $table->string('blood_group');
            $table->string('local_address_line_1');
            $table->string('local_address_line_2');
            $table->string('local_address_city');
            $table->integer('local_address_state');
            $table->string('local_address_country');
            $table->string('local_address_pincode');
            $table->string('permanent_address_line_1');
            $table->string('permanent_address_line_2');
            $table->string('permanent_address_city');
            $table->integer('permanent_address_state');
            $table->string('permanent_address_country');
            $table->string('permanent_address_pincode');
            $table->string('aadhar_number');
            $table->string('name_on_aadhar_card');
            $table->string('aadhar_front_snap');
            $table->string('aadhar_back_snap');
            $table->string('driving_licence_number');
            $table->string('name_as_on_dl');
            $table->string('dob_dl');
            $table->string('dl_issue_date');
            $table->string('dl_expiry_date');
            $table->integer('issued_state');
            $table->string('dl_front_snap');
            $table->string('dl_back_snap');
            $table->string('pan_number');
            $table->string('name_as_on_pancard');
            $table->string('pan_front_snap');
            $table->string('pan_back_snap');
            $table->string('bank_ac_number');
            $table->string('account_holder_name');
            $table->integer('bank_name');
            $table->string('ifsc_code');
            $table->string('branch_name');
            $table->string('cancel_cheque_snap');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
