<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleColumnsToPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchases', function (Blueprint $table) {
            $table->float('reference_no')->change();
            $table->float('paid')->change();
            $table->float('total')->nullable()->after('note');
            $table->float('due')->nullable()->after('paid');
            $table->string('payment_method', 30)->nullable()->after('supplier');
            $table->UnsignedBigInteger('payment_method')->Unsigned()->nullable()->after('supplier');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchases', function (Blueprint $table) {
            $table->dropColumn('total');
            $table->dropColumn('due');
        });
    }
}
