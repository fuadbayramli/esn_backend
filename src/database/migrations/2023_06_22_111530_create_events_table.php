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
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50);
            $table->date('start_date');
            $table->string('start_hour')->nullable();
            $table->string('end_hour')->nullable();
            $table->string('location', 255)->nullable();
            $table->string('provider_name', 100)->nullable();
            $table->mediumText('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('category_id');
            $table->tinyInteger('status')->nullable()->default(0);
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
        Schema::dropIfExists('events');
    }
};
