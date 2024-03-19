<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('roles')->delete();
        
        DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'display_name' => 'Developer',
                'created_at' => '2023-04-03 06:16:19',
                'updated_at' => '2023-04-11 04:44:19',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'local admin',
                'display_name' => 'Local admin',
                'created_at' => '2023-04-03 12:00:29',
                'updated_at' => '2023-04-03 12:23:06',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'super admin',
                'display_name' => 'Super admin',
                'created_at' => '2023-04-10 07:15:04',
                'updated_at' => '2023-04-10 07:15:04',
            ),
        ));
        
        
    }
}