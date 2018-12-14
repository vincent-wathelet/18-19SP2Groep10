<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelUserFeedback extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbackuser', function (Blueprint $table) {
            $table->integer('recieverId',false,true);
            $table->integer('senderId',false,true);
            $table->integer('categroieId',false,true);
            $table->integer('starrating',false,true);
            $table->string('titel');
            $table->string('tekst');
            $table->foreign('recieverId')->references('id')->on('users');
            $table->foreign('senderId')->references('id')->on('users');
            $table->foreign('categroieId')->references('id')->on('categorie');
            $table->primary(array('recieverId','senderId','categroieId'));
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
        Schema::table('feedbackuser', function (Blueprint $table) {
            $table->dropForeign(['recieverId']);
            $table->dropForeign(['senderId']);
            $table->dropForeign(['categroieId']);
        });
        Schema::dropIfExists('feedbackuser');
    }
}
