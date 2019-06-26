<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('no_po', 128);

            $table->unsignedBigInteger('factory_id');

            $table->foreign('factory_id')
                    ->references('id')
                    ->on('factories');
                 
        




            $table->date('tgl');
            $table->string('issue_by', 128);
            $table->string('attention', 128);
            $table->string('payment', 255);
            $table->string('trade_terms', 255);            
            $table->string('trans_type', 255);
            $table->string('npwp', 128);
            $table->string('billing_place', 128);
            $table->string('delivery_site', 128);

            $table->string('incharge', 128);
            $table->string('ass_manager', 128);
            $table->string('manager', 128);
            $table->string('g_manager', 128);
            $table->string('director', 128);
            $table->string('pres_dir', 128);


            $table->string('rule_payment', 128);
            $table->integer('po_total_qty');
            $table->integer('grand_total');

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
        Schema::dropIfExists('customer_orders');
    }
}
