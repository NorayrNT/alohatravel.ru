<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArmeniaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('armenia', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->unsignedTinyInteger('main_id')->nullable();
            $table->unsignedTinyInteger('lang_id')->default('1');
            $table->foreign('lang_id')->references('id')->on('locales')->onDelete('cascade')->onUpdate('cascade');
            $table->char('name');
            $table->text('desc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('armenia');
    }
}
