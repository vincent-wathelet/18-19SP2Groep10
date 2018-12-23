<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssistanceConfirmationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistance_confirmation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('logId')->unsigned();
            $table->boolean('attended');
            $table->boolean('missed');
            $table->timestamps();
            $table->unique(array('user_id','logId'));
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('logId')->references('id')->on('logs');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('userlogs', function (Blueprint $table) {
            $table->dropUnique(array('userid','logId'));
            $table->dropForeign(['userid']);
            $table->dropForeign(['logId']);
        });
        Schema::dropIfExists('userlogs');
    }
}
