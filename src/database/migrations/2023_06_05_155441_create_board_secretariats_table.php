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
        Schema::create('board_secretariats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('duty');
            $table->integer('country_id');
            $table->string('image');
            $table->text('description');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->tinyInteger('main')->nullable()->default(0);
            $table->tinyInteger('status')->nullable()->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->tinyInteger('type')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('board_secretariats');
    }
};
