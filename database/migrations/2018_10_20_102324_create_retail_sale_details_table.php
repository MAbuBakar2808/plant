<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetailSaleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retail_sale_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('retailsalecode_id');
            $table->integer('int_no');
            $table->string('int_desc');
            $table->float('cylinder_capacity');
            $table->integer('in_cylinder_qty');
            $table->integer('filled_cylinders');
            $table->integer('faulty');
            $table->integer('qty_kgs');
            $table->integer('qty_mt');
            $table->float('rate');
            $table->float('approved_rate');
            $table->float('amount');
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
        Schema::dropIfExists('retail_sale_details');
    }
}
