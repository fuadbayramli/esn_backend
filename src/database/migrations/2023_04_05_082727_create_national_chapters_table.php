<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('national_chapters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('user_id')->nullable();
            $table->string('phone', 50);
            $table->string('email');
            $table->string('flag')->nullable();
            $table->string('address', 100)->nullable();
            $table->string('website')->nullable();
            $table->string('ins')->nullable();
            $table->string('fb')->nullable();
            $table->string('in')->nullable();
            $table->string('tel')->nullable();
            $table->string('yt')->nullable();
            $table->string('twitter_feed')->nullable();
            $table->string('instagram_feed')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('national_chapters');
    }
};
