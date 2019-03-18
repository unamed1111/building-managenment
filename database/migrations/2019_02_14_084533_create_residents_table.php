<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('dob');
            $table->boolean('gender');
            $table->string('passport')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->unsignedInteger('apartment_id');
            $table->foreign('apartment_id')
                    ->references('id')->on('apartments')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('residents');
    }
}
