<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidats', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string("title")->nullable();
            $table->string("langue")->nullable();
            $table->string("github")->nullable();
            $table->string("linkedIn")->nullable();
            $table->integer("nbView")->nullable();
            $table->string("sexe")->nullable();
            $table->date("dob")->nullable();
            $table->longText("competence")->nullable();
            $table->bigInteger('candidat_id')->unsigned()->nullable();
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
        Schema::dropIfExists('candidats');
    }
}
