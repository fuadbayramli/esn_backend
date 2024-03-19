<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('members', function (Blueprint $table) {
           $table->string('username');
           $table->string('nam_youth_email')->nullable();
           $table->renameColumn('name','first_name');
           $table->string('last_name');
           $table->date('date_of_birth')->nullable();
           $table->string('nationality');
           $table->string('phone_number');
           $table->smallInteger('gender_id');
           $table->string('country');
           $table->string('postal_code');
           $table->string('city');
           $table->integer('national_chapter');
           $table->string('fb')->nullable();
           $table->string('in')->nullable();
           $table->string('tw')->nullable();
           $table->string('ins')->nullable();
           $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
           $table->dropColumn('username');
           $table->dropColumn('nam_youth_email');
           $table->renameColumn('first_name','name');
           $table->dropColumn('last_name');
           $table->dropColumn('date_of_birth');
           $table->dropColumn('nationality');
           $table->dropColumn('phone_number');
           $table->dropColumn('gender_id');
           $table->dropColumn('country');
           $table->dropColumn('postal_code');
           $table->dropColumn('city');
           $table->dropColumn('national_chapter');
           $table->dropColumn('fb');
           $table->dropColumn('in');
           $table->dropColumn('tw');
           $table->dropColumn('ins');
        });
    }
};
