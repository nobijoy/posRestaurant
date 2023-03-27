<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('reference_no')->nullable();
            $table->longText('order_details')->nullable();
            $table->string('order_type')->nullable();
            $table->double('subtotal')->nullable();
            $table->double('vat')->nullable();
            $table->double('discount')->nullable();
            $table->double('charge')->nullable();
            $table->double('total')->nullable();
            $table->longText('table')->nullable();
            $table->string('status')->nullable();
            $table->UnsignedBigInteger('payment_method')->Unsigned()->nullable();
            $table->UnsignedBigInteger('waiter')->Unsigned()->nullable();
            $table->UnsignedBigInteger('customer')->Unsigned()->nullable();
            $table->UnsignedBigInteger('created_by')->Unsigned()->nullable();
            $table->UnsignedBigInteger('updated_by')->Unsigned()->nullable();
            $table->UnsignedBigInteger('deleted_by')->Unsigned()->nullable();
            $table->foreign('payment_method')->references('id')->on('payment_methods')->onDelete('restrict');
            $table->foreign('waiter')->references('id')->on('employees')->onDelete('restrict');
            $table->foreign('customer')->references('id')->on('customers')->onDelete('restrict');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('restrict');
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
        Schema::dropIfExists('orders');
    }
}
