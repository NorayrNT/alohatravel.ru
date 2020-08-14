<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('in_days', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('in_tour_id');
            $table->foreign('in_tour_id')->references('id')->on('in_tours')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('main_id')->nullable();
            $table->unsignedTinyInteger('lang_id')->default('1');
            $table->char('places');
            $table->text('desc');
            $table->text('images')->nullable();            
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
        Schema::dropIfExists('in_days');
    }
}
