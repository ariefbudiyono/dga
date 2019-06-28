<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('supplier_id');

            $table->foreign('supplier_id')
                  ->references('id')
                   ->on('suppliers');

            $table->string('po_code', 100);
            $table->date('tgl');
            $table->string('payment_term', 255)->nullable();
            $table->string('delivery_term', 255)->nullable();
            $table->string('etd', 128)->nullable();
            $table->string('partial_first_delivery', 255)->nullable();
            $table->enum('status', ['draft','validated', 'proses','delivered','cancel']);

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
        Schema::dropIfExists('purchase_orders');
    }
}
