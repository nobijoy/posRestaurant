<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('reference_no')->nullable();
            $table->UnsignedBigInteger('supplier')->Unsigned()->nullable();
            $table->string('date')->nullable();
            $table->text('note')->nullable();
            $table->string('paid')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->UnsignedBigInteger('created_by')->Unsigned()->nullable();
            $table->UnsignedBigInteger('updated_by')->Unsigned()->nullable();
            $table->UnsignedBigInteger('deleted_by')->Unsigned()->nullable();
            $table->foreign('supplier')->references('id')->on('suppliers')->onDelete('restrict');
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
        Schema::dropIfExists('purchases');
    }
}
