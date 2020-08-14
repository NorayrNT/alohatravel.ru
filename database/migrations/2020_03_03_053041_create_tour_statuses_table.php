<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_statuses', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->unsignedTinyInteger('main_id')->nullable();
            $table->unsignedTinyInteger('lang_id')->default('1');
            $table->foreign('lang_id')->references('id')->on('locales')->onUpdate('cascade')->onDelete('cascade');
            $table->char('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour_statuses');
    }
}
