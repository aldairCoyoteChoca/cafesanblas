<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cart_id')->unsigned()->index();
            $table->enum('status', [1, 2]);
            $table->integer('product_id')->unsigned()->index();
            $table->float('quantify');
            $table->float('price');
            $table->float('subtotal');
            $table->integer('discount')->default(0);

            $table->foreign('cart_id')->references('id')->on('carts')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('product_id')->references('id')->on('products')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('cart_details');
    }
}
