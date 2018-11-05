<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrpcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trpcodes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('trp_name');
            $table->string('trp_address');
            $table->string('trp_ntn');
            $table->string('trp_tax_regno');
            $table->string('trp_telephone');
            $table->string('trp_fax');
            $table->string('trp_email');
            $table->integer('trp_mhno');
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
        Schema::dropIfExists('trpcodes');
    }
}
