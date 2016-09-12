<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserhistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userhistories', function (Blueprint $table) {
            $table->increments('id');

            // the user who added this entry
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // the type of entity for which this entry was created
            $table->string('entity');
            $table->integer('entity_id')->unsigned();

            // the action which was performed
            $table->string('action');
            $table->integer('action_id')->unsigned();

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
        Schema::drop('userhistories');
    }
}
