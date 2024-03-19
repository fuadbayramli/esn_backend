<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleMemberTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('role_member')->delete();
        
        DB::table('role_member')->insert(array (
            0 => 
            array (
                'id' => 2,
                'member_id' => 1,
                'role_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'member_id' => 1,
                'role_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'member_id' => 16,
                'role_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}