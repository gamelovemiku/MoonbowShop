<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaymentTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_transactions', function (Blueprint $table) {

            $table->bigIncrements('payment_id');

            $table->unsignedBigInteger('payment_payer_id');
            $table->foreign('payment_payer_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('payment_provider');
            $table->string('payment_method');
            $table->string('payment_payer');
            $table->double('payment_amount', 10, 2);
            $table->string('payment_status');

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
        Schema::dropIfExists('payment_transactions');
    }
}
