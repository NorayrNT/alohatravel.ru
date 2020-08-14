<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->unsignedTinyInteger('main_id')->nullable();
            $table->unsignedTinyInteger('lang_id')->default('1');
            $table->foreign('lang_id')->references('id')->on('locales')->onDelete('cascade')->onUpdate('cascade');
            $table->char('name')->nullable();
            $table->char('type')->nullable();
            $table->char('trans')->nullable();
            $table->tinyInteger('doors')->nullable();
            $table->tinyInteger('seats')->nullable();
            $table->char('motor')->nullable();
            $table->string('chars');
            $table->char('boots')->nullable();
            $table->text('images')->nullable();
            $table->char('d2');
            $table->char('d4');
            $table->char('d7');
            $table->char('d12');
            $table->char('d30');
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
        Schema::dropIfExists('cars');
    }
}
