<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalkinPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('walkin_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_firstname');
            $table->string('customer_lastname');
            $table->decimal('total_amount', 10,2);
            $table->decimal('amount_paid', 10,2);
            $table->decimal('change', 10,2);
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
        Schema::dropIfExists('walkin_payments');
    }
}
