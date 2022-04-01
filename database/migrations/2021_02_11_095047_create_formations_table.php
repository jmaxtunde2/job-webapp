<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable();
            $table->longText("description")->nullable();
            $table->string("number_expected")->nullable();
            $table->string("address")->nullable();
            $table->string("location")->nullable();
            $table->string("hour")->nullable();
            $table->string("cost")->nullable();
            $table->string("duree")->nullable();
            $table->date("start_date")->nullable();
            $table->date("end_date")->nullable();
            $table->integer("status")->default(1)->nullable();
            $table->bigInteger('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('formations');
    }
}
