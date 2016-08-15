<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->integer('price');
            $table->string('components');
            $table->string('image');
            $table->enum("type", ["consumables", "basic", "common", "support", "weapons", "armor", "artifact", "secret shop"]);
            $table->string("manacost")->nullable();
            $table->time("cooldown")->nullable();

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
