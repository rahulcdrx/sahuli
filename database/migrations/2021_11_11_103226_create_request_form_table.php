<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_form', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('dob');
            $table->string('gender');
            $table->string('email')->unique();
            $table->string('mobile_no',10)->unique();
            $table->string('aadhar_no',12)->unique();
            $table->string('district');
            $table->string('city');
            $table->string('state');
            $table->string('taluka');
            $table->string('referal_name');
            $table->string('trans_image');
            $table->string('transaction_no')->unique();
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
        Schema::dropIfExists('request_form');
    }
}
