<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIgpcfdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('igpcfdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('igpcfcode_id')->nullable();;
            $table->integer('igpd_no')->nullable();
            $table->integer('int_no')->nullable();
            $table->string('int_desc')->nullable();
            $table->string('cyl_qty')->nullable();;
            $table->string('cyl_capacity')->nullable();;
            $table->string('remarks')->nullable();;
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
        Schema::dropIfExists('igpcfdetails');
    }
}
