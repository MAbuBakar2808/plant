<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrpdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trpdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trpcode_id');
            $table->string('trp_vehicle_no');
            $table->string('trp_driver_name');
            $table->string('trp_cnic');
            $table->string('trp_cell');
            $table->integer('trpvehicle_id');
            $table->integer('trp_bs_capacity');
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
        Schema::dropIfExists('trpdetails');
    }
}
