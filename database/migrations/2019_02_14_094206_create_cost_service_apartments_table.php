<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostServiceApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cost_service_apartments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('apartment_id');
            $table->text('service_apartment_id');
            $table->foreign('apartment_id')
                    ->references('id')->on('apartments')
                    ->onDelete('cascade');
            $table->string('month');
            $table->date('payment_date')->nullable();
            $table->double('amount');
            $table->smallInteger('status');
            $table->integer('employee_id')->nullable();
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
        Schema::dropIfExists('cost_service_apartments');
    }
}
