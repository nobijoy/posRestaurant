<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_payments', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('receipt_number')->nullable();
            $table->integer('amount')->nullable();
            $table->dateTime('payment_time')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->UnsignedBigInteger('created_by')->Unsigned()->nullable();
            $table->UnsignedBigInteger('updated_by')->Unsigned()->nullable();
            $table->UnsignedBigInteger('deleted_by')->Unsigned()->nullable();
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
        Schema::dropIfExists('supplier_payments');
    }
}
