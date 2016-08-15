<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('comment_target');
            $table->integer('parent_comment');
            $table->integer('type');
            $table->integer('points');
            $table->string('title');
            $table->text('text');
            $table->integer("user_id")->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');


        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');

    }
}
