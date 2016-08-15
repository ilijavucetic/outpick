<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spells', function (Blueprint $table) {

            $table->increments('id');
            $table->integer("hero_id");
            $table->string('name');
            $table->text('description');
            $table->string('image');
            $table->enum("type", ["q", "w", "e", "r", "x"]);
            $table->string("manacost");
            $table->time("cooldown");

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
        Schema::drop('spells');
    }
}
