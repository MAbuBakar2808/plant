<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIgpassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('igpasses', function (Blueprint $table) {
            $table->increments('id');
            $table->date('igp_date');
            $table->time('igp_time');
            $table->string('igp_type');
            $table->string('supplier_id');
            $table->string('plant_name');
            $table->string('bowser_no');
            $table->string('driver_name');
            $table->string('driver_cell');
            $table->string('load_weight');
            $table->string('offload_weight');
            $table->string('remarks');
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
        Schema::dropIfExists('igpasses');
    }
}
