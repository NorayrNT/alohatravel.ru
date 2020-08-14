<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('out_tours', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedMediumInteger('out_id');
            $table->foreign('out_id')->references('id')->on('outs')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedMediumInteger('main_id')->nullable();
            $table->unsignedTinyInteger('lang_id')->default('1');
            $table->foreign('lang_id')->references('id')->on('locales')->onDelete('cascade')->onUpdate('cascade');
            $table->char('name');           
            $table->text('desc');
            $table->unsignedMediumInteger('price')->nullable();
            $table->text('images')->nullable();
            $table->char('duration')->nullable();
            $table->string('include')->nullable();
            $table->string('exclude')->nullable();
            $table->string('notes')->nullable();
            $table->text('map')->nullable();
            $table->unsignedTinyInteger('stars')->nullable();
            $table->boolean('new')->default(1);
            $table->boolean('active')->default(1);
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
        Schema::dropIfExists('out_tours');
    }
}
