<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Userlog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userlogs', function (Blueprint $table) {
            $table->integer('userid',false,true);
            $table->integer('logId',false,true);
            $table->timestamps();
            $table->primary(array('userid','logId'));
            $table->foreign('userid')->references('id')->on('users');
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
            $table->dropForeign(['userid']);
            $table->dropForeign(['logId']);
        });
        Schema::dropIfExists('userlogs');
    }
}
