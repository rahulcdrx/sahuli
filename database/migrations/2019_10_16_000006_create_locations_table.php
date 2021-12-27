<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->bigInteger('state_id')->nullable()->unsigned();
			$table->foreign('state_id')->references('id')->on('states');
            $table->bigInteger('district_id')->nullable()->unsigned();
			$table->foreign('district_id')->references('id')->on('district');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
