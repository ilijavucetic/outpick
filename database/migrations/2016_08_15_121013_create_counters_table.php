<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counters', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('countered_hero_id')->unsigned();
            $table->integer('counter_hero_id')->unsigned();
            $table->integer('countered_item_id')->unsigned();
            $table->integer('counter_item_id')->unsigned();
            $table->integer('countered_spell_id')->unsigned();
            $table->integer('counter_spell_id')->unsigned();
//            $table->enum("type", ["hh", "hi", "ii", "ss", "si", "is"]);
            $table->text('description');
            $table->integer('price')->nullable();
            $table->string("manacost")->nullable();
            $table->timestamps();

            $table->foreign('countered_hero_id')->references('id')->on('heroes');
            $table->foreign('counter_hero_id')->references('id')->on('heroes');
            $table->foreign('countered_item_id')->references('id')->on('items');
            $table->foreign('counter_item_id')->references('id')->on('items');
            $table->foreign('countered_spell_id')->references('id')->on('spells');
            $table->foreign('counter_spell_id')->references('id')->on('spells');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('counters');
    }
}
