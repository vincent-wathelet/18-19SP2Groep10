<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelFeedbackEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbackevent', function (Blueprint $table) {
            $table->integer('eventId',false,true);
            $table->integer('userId',false,true);
            $table->string('titel');
            $table->string('tekst');
            $table->foreign('eventId')->references('id')->on('event');
            $table->foreign('userId')->references('id')->on('users');
            $table->primary(array('eventId','userId'));
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
        Schema::table('feedbackevent', function (Blueprint $table) {
            $table->dropForeign(['eventId']);
            $table->dropForeign(['userId']);
        });
        Schema::dropIfExists('feedbackevent');
    }
}
