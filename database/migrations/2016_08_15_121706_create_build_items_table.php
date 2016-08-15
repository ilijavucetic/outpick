<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('build_items', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('build_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->integer('price');
            $table->timestamps();

            $table->foreign('build_id')->references('id')->on('builds');
            $table->foreign('item_id')->references('id')->on('items');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('build_items');
    }
}
