<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {

            $table->integer('id',true,true);
            $table->integer('categorieId',false,true);
            $table->string('naam');
            $table->integer('lokaalId',false,true);
            $table->integer('maxInschrijvingen');
            $table->datetime('begindate');
            $table->datetime('enddate');
            $table->boolean('autoaccept');
            $table->string('description');
            $table->boolean('hidden');
            $table->unique(['id','categorieId']);
            $table->timestamps();
            $table->foreign('categorieId')->references('id')->on('categorie');
            $table->foreign('lokaalId')->references('id')->on('lokaal');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event', function (Blueprint $table) {
            $table->dropForeign('[categorieId]');
            $table->dropForeign('[lokaalId]');
            $table->dropUnique(['id','categorieId']);
        });
        Schema::dropIfExists('event');
    }
}
