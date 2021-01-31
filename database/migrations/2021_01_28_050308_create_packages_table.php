<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('area');
            $table->string('schedule')->comment('in Hrs');
            $table->integer('price_1')->comment('upto 1 kg');
            $table->integer('price_2')->comment('upto 2 kg');
            $table->integer('price_3')->comment('upto 3 kg');
            $table->integer('price_extra')->comment('over 3 kg extra price/kg');
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
        Schema::dropIfExists('packages');
    }
}
