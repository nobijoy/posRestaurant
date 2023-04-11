<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropPaymentMethodKeyFromSupplierPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('supplier_payments', function (Blueprint $table) {
            $table->dropForeign('supplier_payments_payment_method_foreign');
//            $table->string('payment_method', 30)->default('cash')->change();
            $table->string('payment_method', 30)->nullable()->change();
        });

        Schema::table('purchases', function (Blueprint $table) {
            $table->dropForeign('purchases_payment_method_foreign');
//            $table->string('payment_method', 30)->default('cash')->change();
            $table->string('payment_method', 30)->nullable()->change();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_payment_method_foreign');
//            $table->string('payment_method', 30)->default('cash')->change();
            $table->string('payment_method', 30)->nullable()->change();
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
            $table->unsignedBigInteger('payment_method')->unsigned()->change();
            $table->foreign('payment_method')->references('id')->on('payment_methods');
        });

        Schema::table('purchases', function (Blueprint $table) {
            $table->unsignedBigInteger('payment_method')->unsigned()->change();
            $table->foreign('payment_method')->references('id')->on('payment_methods');

        });
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('payment_method')->unsigned()->change();
            $table->foreign('payment_method')->references('id')->on('payment_methods');

        });
    }
}
