<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentMethodColumnToSupplierPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('supplier_payments', function (Blueprint $table) {
            $table->float('receipt_number')->change();
            $table->UnsignedBigInteger('payment_method')->Unsigned()->nullable()->after('name');
            $table->foreign('payment_method')->references('id')->on('payment_methods')->onDelete('restrict');

            $table->string('payment_method', 30)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('supplier_payments', function (Blueprint $table) {
            $table->dropForeign(['payment_method']);
        });
    }
}
