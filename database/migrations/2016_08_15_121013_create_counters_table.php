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
            $table->integer('countered_hero_id');
            $table->integer('counter_hero_id');
            $table->integer('countered_item_id');
            $table->integer('counter_item_id');
            $table->integer('countered_spell_id');
            $table->integer('counter_spell_id');
//            $table->enum("type", ["hh", "hi", "ii", "ss", "si", "is"]);
            $table->text('description');
            $table->integer('price')->nullable();
            $table->string("manacost")->nullable();

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
        Schema::drop('items');
    }
}
