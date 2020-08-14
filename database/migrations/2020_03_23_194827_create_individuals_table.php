<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individuals', function (Blueprint $table) {
                $table->tinyIncrements('id');
                $table->unsignedTinyInteger('main_id')->nullable();
                $table->unsignedTinyInteger('lang_id')->default('1');
                $table->foreign('lang_id')->references('id')->on('locales')->onDelete('cascade')->onUpdate('cascade');
                $table->char('name');
                $table->text('desc');
                $table->integer('wt3')->nullable();
                $table->integer('wt7')->nullable();
                $table->integer('wt18')->nullable();
                $table->integer('w3')->nullable();
                $table->integer('w7')->nullable();
                $table->integer('w18')->nullable();
                $table->string('images',350)->nullable();
                $table->char('km')->nullable();
                $table->char('duration')->nullable();
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
        Schema::dropIfExists('individuals');
    }
}
