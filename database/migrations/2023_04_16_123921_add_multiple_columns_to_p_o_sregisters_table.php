<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleColumnsToPOSregistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('p_o_sregisters', function (Blueprint $table) {
            $table->float('cash_closing')->nullable()->after('cash');
            $table->float('credit_closing')->nullable()->after('credit');
            $table->float('debit_closing')->nullable()->after('debit');
            $table->float('check_closing')->nullable()->after('check');
            $table->float('bank_transfer_closing')->nullable()->after('bank_transfer');
            $table->float('bkash_closing')->nullable()->after('bkash');
            $table->float('rocket_closing')->nullable()->after('rocket');
            $table->float('nagad_closing')->nullable()->after('nagad');
            $table->double('total')->nullable()->after('nagad_closing');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('p_o_sregisters', function (Blueprint $table) {
            $table->dropColumn('cash_closing');
            $table->dropColumn('credit_closing');
            $table->dropColumn('debit_closing');
            $table->dropColumn('check_closing');
            $table->dropColumn('bank_transfer_closing');
            $table->dropColumn('bkash_closing');
            $table->dropColumn('rocket_closing');
            $table->dropColumn('nagad_closing');
            $table->dropColumn('total');
        });
    }
}
