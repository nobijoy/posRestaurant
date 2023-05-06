<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->integer('reciept_no')->nullable();
            $table->string('order_type')->nullable();
            $table->double('subtotal')->nullable();
            $table->double('vat')->nullable();
            $table->double('discount')->nullable();
            $table->double('charge')->nullable();
            $table->double('total')->nullable();
            $table->string('payment_method', 30)->nullable();
            $table->UnsignedBigInteger('customer')->Unsigned()->nullable();
            $table->UnsignedBigInteger('created_by')->Unsigned()->nullable();
            $table->foreign('customer')->references('id')->on('customers')->onDelete('restrict');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict');
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
        Schema::dropIfExists('sales');
    }
}
