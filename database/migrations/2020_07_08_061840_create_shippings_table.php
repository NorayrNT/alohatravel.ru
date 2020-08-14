<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->mediumIncrements('id');            
            $table->unsignedTinyInteger('shipping_type');
            $table->foreign('shipping_type')->references('id')->on('shipping_types')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->unsignedMediumInteger('main_id')->nullable();
            $table->unsignedTinyInteger('lang_id')->default('1');
            $table->foreign('lang_id')->references('id')->on('locales')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('price')->nullable();
            $table->unsignedMediumInteger('luggage')->nullable();
            $table->unsignedTinyInteger('duration')->nullable();
            $table->unsignedMediumInteger('distance')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('shippings');
    }
}
