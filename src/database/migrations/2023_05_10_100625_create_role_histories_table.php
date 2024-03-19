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
        Schema::create('role_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role_name', 30)->nullable();
            $table->string('action', 30)->nullable();
            $table->string('user', 30)->nullable();
            $table->timestamp('date')->nullable();
            $table->integer('member_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_histories');
    }
};
