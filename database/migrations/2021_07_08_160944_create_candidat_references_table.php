<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidat_references', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string("names")->nullable();
            $table->string("relation")->nullable();
            $table->string("phone")->nullable();
            $table->string("email")->nullable();
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
        Schema::dropIfExists('candidat_references');
    }
}
