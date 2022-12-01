<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientConsumptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_consumptions', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('ingredient_id')->Unsigned()->nullable();
            $table->UnsignedBigInteger('menu_id')->Unsigned()->nullable();
            $table->string('consumption_amount')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->UnsignedBigInteger('created_by')->Unsigned()->nullable();
            $table->UnsignedBigInteger('updated_by')->Unsigned()->nullable();
            $table->UnsignedBigInteger('deleted_by')->Unsigned()->nullable();
            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('restrict');
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('restrict');
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
        Schema::dropIfExists('ingredient_consumptions');
    }
}
