<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('parcelID');
            $table->string('product');
            $table->string('merchant_inv');
            $table->integer('merchant_id');
            $table->string('pickup_address');
            $table->string('recipient_address');
            $table->string('recipient_phone');
            $table->string('recipient_name');
            // $table->string('pickup_type');
            $table->string('note')->nullable();
            $table->integer('amount')->nullable()->comment('cash on delivery amount');
            $table->integer('weight');
            $table->integer('package_id');
            $table->integer('delivery_price');
            $table->tinyInteger('status')->comment('0=>created, 1=>confirm/processing, 2=>shipping, 3=>reschedule, 4=>return, 5=>Done');
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
        Schema::dropIfExists('parcels');
    }
}
