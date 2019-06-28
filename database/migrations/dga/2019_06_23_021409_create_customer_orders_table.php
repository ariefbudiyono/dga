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
            $table->string('issue_by', 128)->nullable();
            $table->string('attention', 128)->nullable();
            $table->string('payment', 255)->nullable();
            $table->string('trade_terms', 255)->nullable();            
            $table->string('trans_type', 255)->nullable();
            $table->string('npwp', 128)->nullable();
            $table->string('billing_place', 128)->nullable();
            $table->string('delivery_site', 128)->nullable();

            $table->string('incharge', 128)->nullable();
            $table->string('ass_manager', 128)->nullable();
            $table->string('manager', 128)->nullable();
            $table->string('g_manager', 128)->nullable();
            $table->string('director', 128)->nullable();
            $table->string('pres_dir', 128)->nullable();


            $table->string('rule_payment', 128)->nullable();
            $table->integer('po_total_qty')->default(0);
            $table->integer('grand_total')->default(0);

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
