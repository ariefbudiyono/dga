<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductsWarehouse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_warehouses', function (Blueprint $table) {
            
            $table->unsignedBigInteger('product_id');

            $table->foreign('product_id')
                    ->references('id')
                    ->on('products');

                    $table->unsignedBigInteger('warehouse_id');

                    $table->foreign('warehouse_id')
                          ->references('id')
                           ->on('warehouses');       

            $table->integer('qty')->default(0);      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_warehouses');
    }
}
