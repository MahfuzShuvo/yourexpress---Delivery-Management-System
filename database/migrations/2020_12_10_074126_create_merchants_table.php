<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('merchantID');
            $table->string('name');
            $table->string('company');
            $table->string('address');
            $table->string('pickup');
            $table->string('website')->nullable();
            $table->string('pickup_type');
            $table->string('zone')->comment('1 => Inside Dhaka, 2 => Outside Dhaka & 3 => Dhaka Suburb');
            $table->string('photo');
            $table->string('identity')->unique();
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('merchants');
    }
}
