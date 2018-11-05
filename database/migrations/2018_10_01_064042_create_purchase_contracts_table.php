<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->float('contract_code');
            $table->date('contract_date');
            $table->string('cnt_cgt_person');
            $table->string('party_name');
            $table->integer('qty');
            $table->string('delivery_terms');
            $table->string('rate_type');
            $table->float('rate');
            $table->float('amount');
            $table->float('adv');
            $table->float('advance');
            $table->integer('no_of_bos');
            $table->date('delivery_period_from');
            $table->date('delivery_period_to');
            $table->date('expiry_date');
            $table->string('contract_status');
            $table->string('contact_person');
            $table->string('remarks');
            $table->string('stax_invoice');
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
        Schema::dropIfExists('purchase_contracts');
    }
}
