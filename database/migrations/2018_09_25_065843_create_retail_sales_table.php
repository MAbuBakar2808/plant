<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetailSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retail_sales', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('plant_id');
            $table->string('party_id');
            $table->string('party_vehicle');
            $table->string('stock');
            $table->string('remarks');
            $table->integer('rate');
            $table->float('cyl_capacity');
            $table->integer('cyl_qty');
            $table->integer('faulty');
            $table->integer('filled');
            $table->float('final_rate');
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
        Schema::dropIfExists('retail_sales');
    }
}
