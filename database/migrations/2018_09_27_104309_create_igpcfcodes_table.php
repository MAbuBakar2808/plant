<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIgpcfcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('igpcfcodes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('igp_no')->nullable();
            $table->integer('token_no')->nullable();
            $table->time('igp_time')->nullable();
            $table->date('igp_date')->nullable();
            $table->integer('distributor_id')->nullable();
            $table->string('vehicle_no')->nullable();
            $table->string('driver_name')->nullable();
            $table->string('driver_cell')->nullable();
            $table->integer('plant_id')->nullable();
            $table->string('remark')->nullable();
            $table->string('user_name')->nullable();
            $table->date('entry_date')->nullable();
            $table->time('entry_time')->nullable();
            $table->string('rs_status')->nullable();
            $table->string('igp_status')->nullable();
            $table->integer('ogp_no')->nullable();
            $table->string('igp_type')->nullable();
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
        Schema::dropIfExists('igpcfcodes');
    }
}
