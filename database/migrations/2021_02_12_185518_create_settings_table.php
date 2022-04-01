<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string("website_title")->nullable();
            $table->string("website_url")->nullable();
            $table->string("facebook")->nullable();
            $table->string("instagram")->nullable();
            $table->string("linkedIn")->nullable();
            $table->string("twitter")->nullable();
            $table->longText("vision")->nullable();
            $table->longText("mission")->nullable();
            $table->longText("principle")->nullable();            
            $table->longText("introduction")->nullable();
            $table->longText("conclusion")->nullable();
            $table->string("logo")->nullable();
            $table->integer("status")->default(0)->nullable();         
            $table->longText('meta_tags')->nullable();
            $table->longText('meta_description')->nullable();
            $table->string('address')->nullable();
            $table->string('tel')->nullable();
            $table->string('email')->nullable();
            $table->string('whatsApp')->nullable();
            $table->string('breve_desc')->nullable();

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
        Schema::dropIfExists('settings');
    }
}
