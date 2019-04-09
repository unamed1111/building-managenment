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
            $table->text('service_apartment_ids'); 
            $table->foreign('apartment_id')
                    ->references('id')->on('apartments')
                    ->onDelete('cascade');
            $table->string('month');
            $table->date('payment_date');
            $table->float('amount');
            $table->float('paid_amount');
            $table->float('debt_amount');
            $table->boolean('status');
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
