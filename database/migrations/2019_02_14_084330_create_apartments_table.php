<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->smallInteger('floor');
            $table->boolean('status');
            $table->float('acreage')->comment('diện tích');
            $table->unsignedInteger('building_id');
            $table->string('owner_name')->nullable();
            $table->string('phone')->nullable();
            // $table->unsignedInteger('apartment_owner_id');
            $table->foreign('building_id')
                    ->references('id')->on('buildings')
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
        Schema::dropIfExists('apartments');
    }
}
