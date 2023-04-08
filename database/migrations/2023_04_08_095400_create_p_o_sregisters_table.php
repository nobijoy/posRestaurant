<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePOSregistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_o_sregisters', function (Blueprint $table) {
            $table->id();
            $table->float('cash')->nullable();
            $table->float('credit')->nullable();
            $table->float('debit')->nullable();
            $table->float('check')->nullable();
            $table->float('bank_transfer')->nullable();
            $table->float('bkash')->nullable();
            $table->float('rocket')->nullable();
            $table->float('nagad')->nullable();
            $table->tinyInteger('is_open')->default(0);
            $table->UnsignedBigInteger('created_by')->Unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict');
            $table->dateTime('closing_time')->nullable();
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
        Schema::dropIfExists('p_o_sregisters');
    }
}
