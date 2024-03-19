<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OauthClientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('oauth_clients')->delete();
        
        DB::table('oauth_clients')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => NULL,
                'name' => 'Laravel Personal Access Client',
                'secret' => 'ci7ZbxlCRs5LIKSqChhfq1ha1Dr2MstB6Gr5WDnO',
                'provider' => NULL,
                'redirect' => 'http://localhost',
                'personal_access_client' => 1,
                'password_client' => 0,
                'revoked' => 0,
                'created_at' => '2023-04-03 06:15:22',
                'updated_at' => '2023-04-03 06:15:22',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => NULL,
                'name' => 'Laravel Password Grant Client',
                'secret' => 'knEpcO0gwt664thw19oZBVsMudJ9oiMaNY3uGYGZ',
                'provider' => 'users',
                'redirect' => 'http://localhost',
                'personal_access_client' => 0,
                'password_client' => 1,
                'revoked' => 0,
                'created_at' => '2023-04-03 06:15:22',
                'updated_at' => '2023-04-03 06:15:22',
            ),
        ));
        
        
    }
}