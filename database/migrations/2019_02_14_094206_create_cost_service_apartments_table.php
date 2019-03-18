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
            $table->unsignedInteger('service_apartment_id');
            $table->string('month');
            $table->date('payment_date');
            $table->float('amount');
            $table->float('paid_amount');
            $table->float('debt_amount');
            $table->boolean('status');
            $table->foreign('service_apartment_id')
                    ->references('id')->on('apartment_services')
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
        Schema::dropIfExists('cost_service_apartments');
    }
}