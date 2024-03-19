<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('users')->delete();
        
        DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$7uD73Dr2K/7pClCuq3WACufUNWkJEsAWHPR1TLguKgt5qh9/o4Y4e',
                'remember_token' => 'WL8jvKzw34apcY2ThbGXxPFcajnsatcCDxqvrYawVSREu4gu37F7PNO3cxo8',
                'settings' => NULL,
                'created_at' => '2023-04-03 06:16:20',
                'updated_at' => '2023-04-03 06:16:20',
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => 3,
                'name' => 'Fuad',
                'email' => 'fuad.bayramli@azintelecom.az',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$i45W62xD0iUdBjoj53MDs.JndyimkSV46rGZKDVbpJabV9YWlGPyC',
                'remember_token' => NULL,
                'settings' => '{"locale":"en"}',
                'created_at' => '2023-04-03 12:17:28',
                'updated_at' => '2023-04-03 12:17:28',
            ),
        ));
        
        
    }
}