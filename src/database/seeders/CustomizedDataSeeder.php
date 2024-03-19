<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class CustomizedDataSeeder extends Seeder
{
    /**
     * Seed the application's custom tables.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            NationalChaptersTableSeeder::class,
            MembersTableSeeder::class,
            RoleMemberTableSeeder::class,
        ]);
    }
}
