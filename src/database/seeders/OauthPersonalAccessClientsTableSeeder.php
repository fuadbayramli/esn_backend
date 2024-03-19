<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OauthPersonalAccessClientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('oauth_personal_access_clients')->delete();
        
        DB::table('oauth_personal_access_clients')->insert(array (
            0 => 
            array (
                'id' => 1,
                'client_id' => 1,
                'created_at' => '2023-04-03 06:15:22',
                'updated_at' => '2023-04-03 06:15:22',
            ),
        ));
        
        
    }
}