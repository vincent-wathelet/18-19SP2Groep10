<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInschrijvingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inschrijvings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('eventid',false,true);
            $table->integer('userid',false,true);
            $table->boolean('bevestigt');
            $table->boolean('aanwezig');
            $table->foreign('eventid')->references('id')->on('event');
            $table->foreign('userid')->references('id')->on('users');
            $table->unique(['eventid','userid']);
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
        Schema::table('inschrijvings', function (Blueprint $table) {
            $table->dropForeign(['eventid']);
            $table->dropForeign(['userid']);
            $table->dropUnique(['eventid','userid']);
        });
        Schema::dropIfExists('inschrijvings');
    }
}
