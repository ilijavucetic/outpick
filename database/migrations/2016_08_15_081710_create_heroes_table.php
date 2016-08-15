<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('heroes', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('image');
            $table->enum("type", ["strength", "agility", "intelligence"]);
            $table->enum("attack_type", ["all", "melee", "range"]);
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
        Schema::drop('heroes');
    }
}
