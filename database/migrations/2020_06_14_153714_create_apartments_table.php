<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedSmallInteger('price');
            $table->char('address');
            $table->unsignedTinyInteger('floors');
            $table->unsignedTinyInteger('bedrooms');
            $table->unsignedTinyInteger('rooms');
            $table->boolean('satellite')->default(0);
            $table->boolean('ac')->default(0);
            $table->boolean('wifi')->default(0);
            $table->boolean('wash')->default(0);
            $table->boolean('elevator')->default(0);
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
        Schema::dropIfExists('apartments');
    }
}
