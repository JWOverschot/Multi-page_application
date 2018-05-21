<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->integer('order_id_fk');
            $table->foreign('order_id_fk')->references('order_id')->on('orders')->onDelete('cascade');
            $table->integer('product_id_fk');
            $table->foreign('product_id_fk')->references('product_id')->on('products')->onDelete('cascade');
            $table->integer('quantity');
            $table->double('price', 15, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
