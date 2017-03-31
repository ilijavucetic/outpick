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
            $table->integer("hero_id")->unsigned();
            $table->string('name');
            $table->text('description');
            $table->string('image');
            $table->enum('ability_type', ['Point Target', 'No Target', 'Aura', 'None']);
            $table->enum('affects', ['Self', 'Enemies', 'Allies', 'None']);
            $table->enum('damage_type', ['Magical', 'Physical', 'Pure']);
            $table->string('radius');
            $table->boolean('pierces_spell_immunity');
            $table->enum("spell_order", ["q", "w", "e", "r", "x"]);
            $table->string("manacost");
            $table->time("cooldown");
            $table->timestamps();

            $table->foreign('hero_id')->references('id')->on('heroes');
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
