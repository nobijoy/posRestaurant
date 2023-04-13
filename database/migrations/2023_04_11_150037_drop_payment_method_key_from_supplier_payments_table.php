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
            $table->dropForeign(['payment_method']);
        });

        Schema::table('supplier_payments', function (Blueprint $table) {
            $table->string('payment_method', 30)->nullable()->change();
        });
        Schema::table('purchases', function (Blueprint $table) {
            $table->dropForeign(['payment_method']);
        });

        Schema::table('purchases', function (Blueprint $table) {
            $table->string('payment_method', 30)->nullable()->change();
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['payment_method']);
        });

        Schema::table('orders', function (Blueprint $table) {
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
    }
}
