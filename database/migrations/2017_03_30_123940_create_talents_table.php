<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTalentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talents', function (Blueprint $table) {

            $table->increments('id');
            $table->integer("hero_id")->unsigned();
            $table->enum("order", [0, 1]);
            $table->enum("level", [10, 15, 20, 25]);
            $table->text('description');
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
        Schema::drop('talents');
    }
}
