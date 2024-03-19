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
        Schema::table('timelines', function (Blueprint $table) {
            $table->renameColumn('year', 'date');
        });

       Schema::table('timelines', function (Blueprint $table) {
            $table->date('date')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('timelines', function (Blueprint $table) {
            $table->renameColumn('date', 'year');
        });

        Schema::table('timelines', function (Blueprint $table) {
            $table->string('year')->change();
        });
    }
};
