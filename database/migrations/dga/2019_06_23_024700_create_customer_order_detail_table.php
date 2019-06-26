<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_order_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_order_id');

            $table->foreign('customer_order_id')
                    ->references('id')
                    ->on('customer_orders');


            $table->unsignedBigInteger('product_id');

            $table->foreign('product_id')
                  ->references('id')
                   ->on('products');

            $table->integer('unit')->default(0);
            $table->integer('po_qty')->default(0);
            $table->integer('unit_price')->default(0);
            $table->integer('amount')->default(0);

            $table->string('etd', 100);
            $table->string('eta', 100);

            $table->string('model', 100);

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
        Schema::dropIfExists('customer_order_detail');
    }
}
