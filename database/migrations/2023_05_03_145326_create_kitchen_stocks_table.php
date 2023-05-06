<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKitchenStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kitchen_stocks', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('ingredient')->Unsigned()->nullable();
            $table->double('quantity')->nullable();
            $table->foreign('ingredient')->references('id')->on('ingredients')->onDelete('restrict');
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
        Schema::dropIfExists('kitchen_stocks');
    }
}
