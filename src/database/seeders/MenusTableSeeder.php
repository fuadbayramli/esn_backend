<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('menus')->delete();
        
        DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'created_at' => '2023-04-03 06:16:19',
                'updated_at' => '2023-04-03 06:16:19',
            ),
        ));
        
        
    }
}