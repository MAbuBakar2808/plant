<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetailSaleCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retail_sale_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rs_no');
            $table->date('rs_date');
            $table->integer('igp_no');
            $table->date('igp_date');
            $table->integer('distributor_id');
            $table->integer('plant_id');
            $table->string('vehicle_no');
            $table->integer('std_rate');
            $table->string('ogp_status');
            $table->string('stock');
            $table->integer('stock_code');
            $table->string('remarks');
            $table->integer('cons_rate');
            $table->integer('inv_value');
            $table->integer('customer_bal');
            $table->string('user_name');
            $table->date('entry_date');
            $table->date('entry_time');
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
        Schema::dropIfExists('retail_sale_codes');
    }
}
