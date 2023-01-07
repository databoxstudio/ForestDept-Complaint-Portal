<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name', 50)->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('password')->nullable()->change();
            $table->string('first_name')->nullable()->change(); 
            $table->string('last_name')->nullable()->change();
            $table->string('fathers_name')->nullable()->change();
            $table->string('dob')->nullable()->change();
            $table->string('blood_group')->nullable()->change();
            $table->string('local_address_line_1')->nullable()->change();
            $table->string('local_address_line_2')->nullable()->change();
            $table->string('local_address_city')->nullable()->change();
            $table->integer('local_address_state')->nullable()->change();
            $table->string('local_address_country')->nullable()->change();
            $table->string('local_address_pincode')->nullable()->change();
            $table->string('permanent_address_line_1')->nullable()->change();
            $table->string('permanent_address_line_2')->nullable()->change();
            $table->string('permanent_address_city')->nullable()->change();
            $table->integer('permanent_address_state')->nullable()->change();
            $table->string('permanent_address_country')->nullable()->change();
            $table->string('permanent_address_pincode')->nullable()->change();
            $table->string('aadhar_number')->nullable()->change();
            $table->string('name_on_aadhar_card')->nullable()->change();
            $table->string('aadhar_front_snap')->nullable()->change();
            $table->string('aadhar_back_snap')->nullable()->change();
            $table->string('driving_licence_number')->nullable()->change();
            $table->string('name_as_on_dl')->nullable()->change();
            $table->string('dob_dl')->nullable()->change();
            $table->string('dl_issue_date')->nullable()->change();
            $table->string('dl_expiry_date')->nullable()->change();
            $table->integer('issued_state')->nullable()->change();
            $table->string('dl_front_snap')->nullable()->change();
            $table->string('dl_back_snap')->nullable()->change();
            $table->string('pan_number')->nullable()->change();
            $table->string('name_as_on_pancard')->nullable()->change();
            $table->string('pan_front_snap')->nullable()->change();
            $table->string('pan_back_snap')->nullable()->change();
            $table->string('bank_ac_number')->nullable()->change();
            $table->string('account_holder_name')->nullable()->change();
            $table->integer('bank_name')->nullable()->change();
            $table->string('ifsc_code')->nullable()->change();
            $table->string('branch_name')->nullable()->change();
            $table->string('cancel_cheque_snap')->nullable()->change();
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
            $table->string('name', 50)->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('password')->nullable()->change();
            $table->string('first_name')->nullable()->change(); 
            $table->string('last_name')->nullable()->change();
            $table->string('fathers_name')->nullable()->change();
            $table->string('dob')->nullable()->change();
            $table->string('blood_group')->nullable()->change();
            $table->string('local_address_line_1')->nullable()->change();
            $table->string('local_address_line_2')->nullable()->change();
            $table->string('local_address_city')->nullable()->change();
            $table->integer('local_address_state')->nullable()->change();
            $table->string('local_address_country')->nullable()->change();
            $table->string('local_address_pincode')->nullable()->change();
            $table->string('permanent_address_line_1')->nullable()->change();
            $table->string('permanent_address_line_2')->nullable()->change();
            $table->string('permanent_address_city')->nullable()->change();
            $table->integer('permanent_address_state')->nullable()->change();
            $table->string('permanent_address_country')->nullable()->change();
            $table->string('permanent_address_pincode')->nullable()->change();
            $table->string('aadhar_number')->nullable()->change();
            $table->string('name_on_aadhar_card')->nullable()->change();
            $table->string('aadhar_front_snap')->nullable()->change();
            $table->string('aadhar_back_snap')->nullable()->change();
            $table->string('driving_licence_number')->nullable()->change();
            $table->string('name_as_on_dl')->nullable()->change();
            $table->string('dob_dl')->nullable()->change();
            $table->string('dl_issue_date')->nullable()->change();
            $table->string('dl_expiry_date')->nullable()->change();
            $table->integer('issued_state')->nullable()->change();
            $table->string('dl_front_snap')->nullable()->change();
            $table->string('dl_back_snap')->nullable()->change();
            $table->string('pan_number')->nullable()->change();
            $table->string('name_as_on_pancard')->nullable()->change();
            $table->string('pan_front_snap')->nullable()->change();
            $table->string('pan_back_snap')->nullable()->change();
            $table->string('bank_ac_number')->nullable()->change();
            $table->string('account_holder_name')->nullable()->change();
            $table->integer('bank_name')->nullable()->change();
            $table->string('ifsc_code')->nullable()->change();
            $table->string('branch_name')->nullable()->change();
            $table->string('cancel_cheque_snap')->nullable()->change();
        });
    }
}
