<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_types', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->char('title');
            $table->unsignedTinyInteger('main_id')->nullable();
            $table->unsignedTinyInteger('lang_id');
            $table->foreign('lang_id')->references('id')->on('locales')->onUpdate('cascade')->onDelete('cascade');
            $table->text('desc');
            $table->char('url')->nullable();
            $table->text('images')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour_types');
    }
}
