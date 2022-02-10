<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->float('amount',10,2);
            $table->enum('status',['pending','successful','failed']);
            $table->string('external_reference',50);
            $table->string('payment_method',20)->default('stripe');
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
        Schema::dropIfExists('payments');
    }
}
