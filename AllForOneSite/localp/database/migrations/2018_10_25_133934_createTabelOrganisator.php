<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelOrganisator extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisatoren', function (Blueprint $table) {
            $table->integer('eventId',false,true);
            $table->integer('userId',false,true);
            $table->string('titel');
            $table->foreign('eventId')->references('id')->on('event');
            $table->foreign('userId')->references('id')->on('users');
            $table->timestamps();
            $table->primary(array('eventId','userId'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organisatoren', function (Blueprint $table) {
            $table->dropForeign(['eventId']);
            $table->dropForeign(['userId']);
        });
        Schema::dropIfExists('organisatoren');
    }
}
