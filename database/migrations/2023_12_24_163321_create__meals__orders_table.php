<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('meal_id')->unsigned();
            $table->unsignedBiginteger('order_id')->unsigned();
            $table->integer('quantity');
            $table->double('price');
            $table->foreign('meal_id')->references('id')
            ->on('meals')->onDelete('cascade');
            $table->foreign('order_id')->references('id')
            ->on('orders')->onDelete('cascade');
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
        Schema::dropIfExists('meals_orders');
    }
};
