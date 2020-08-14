<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('in_tours', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('in_id');
            $table->foreign('in_id')->references('id')->on('ins')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedTinyInteger('main_id')->nullable();
            $table->unsignedTinyInteger('lang_id')->default('1');
            $table->foreign('lang_id')->references('id')->on('locales')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedTinyInteger('status_id')->nullable();
            $table->foreign('status_id')->references('id')->on('tour_statuses')->onUpdate('cascade')->onDelete('cascade');          
            $table->char('name');
            $table->char('duration')->nullable();
            $table->text('desc');
            $table->integer('price')->nullable();
            $table->unsignedTinyInteger('stars')->nullable();
            $table->string('images')->nullable();
            $table->string('include')->nullable();
            $table->string('exclude')->nullable();
            $table->string('notes')->nullable();
            $table->boolean('active')->default(1); 
            $table->boolean('top')->default(0); 
            $table->unsignedSmallInteger('p6')->nullable();
            $table->unsignedSmallInteger('p8')->nullable();
            $table->unsignedSmallInteger('p10')->nullable();
            $table->unsignedSmallInteger('p12')->nullable();
            $table->unsignedSmallInteger('p16')->nullable();
            $table->text('map')->nullable();
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
        Schema::dropIfExists('in_tours');
    }
}
