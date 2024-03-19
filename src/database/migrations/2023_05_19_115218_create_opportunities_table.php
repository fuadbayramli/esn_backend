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
        Schema::create('opportunities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id');
            $table->string('address')->nullable();
            $table->timestamp('deadline')->nullable();
            $table->string('title');
            $table->string('organization_name')->nullable();
            $table->string('image');
            $table->string('apply_link')->nullable();
            $table->text('description');
            $table->string('inner_title');
            $table->text('inner_description');
            $table->tinyInteger('category_id');
            $table->timestamps();
            $table->softDeletes();
            $table->tinyInteger('status')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opportunities');
    }
};
