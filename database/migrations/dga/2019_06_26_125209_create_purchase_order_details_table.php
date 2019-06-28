<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_order_details', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('purchase_order_id');

            $table->foreign('purchase_order_id')
                    ->references('id')
                    ->on('purchase_orders');

            $table->unsignedBigInteger('product_id');

            $table->foreign('product_id')
                    ->references('id')
                    ->on('products');

            $table->integer('qty')->default(0);
            $table->integer('unit_price')->default(0);
            $table->integer('amount')->default(0);


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
        Schema::dropIfExists('purchase_order_details');
    }
}
