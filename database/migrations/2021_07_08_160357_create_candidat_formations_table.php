<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidat_formations', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string("school")->nullable();
            $table->string("debut")->nullable();
            $table->string("fin")->nullable();
            $table->string("diplome_obtenue")->nullable();
            $table->string("mention")->nullable();
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
        Schema::dropIfExists('candidat_formations');
    }
}
