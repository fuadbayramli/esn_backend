<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OauthAccessTokensTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('oauth_access_tokens')->delete();
        
        DB::table('oauth_access_tokens')->insert(array (
            0 => 
            array (
                'id' => '0b87951fa52d9b853c909b6a3b6f064f73b141d253a47267fb913d52f7f0b41683a9cb19f1f4fdbf',
                'user_id' => 4,
                'client_id' => 1,
                'name' => 'EsnToken',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2023-04-04 09:10:40',
                'updated_at' => '2023-04-04 09:10:40',
                'expires_at' => '2024-04-04 09:10:40',
            ),
            1 => 
            array (
                'id' => '1bd1557f9193496c8451309d339541a6e3fbacab07197a8589d1fb44585377e58d3058d3866d6bd6',
                'user_id' => 11,
                'client_id' => 1,
                'name' => 'EsnToken',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2023-04-04 11:09:23',
                'updated_at' => '2023-04-04 11:09:23',
                'expires_at' => '2024-04-04 11:09:23',
            ),
            2 => 
            array (
                'id' => '3d85d33078e5419e125e89cc565e5f88238796fc53bc6b6e941072510472297cffbd8aa7f1228b12',
                'user_id' => 12,
                'client_id' => 1,
                'name' => 'EsnToken',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2023-04-04 11:10:17',
                'updated_at' => '2023-04-04 11:10:17',
                'expires_at' => '2024-04-04 11:10:17',
            ),
            3 => 
            array (
                'id' => '54dd9dbd289ae223652ab96be67435eaf1efac8dfaf5f6881061448f8d30044ec327d68c4c1a857d',
                'user_id' => 13,
                'client_id' => 1,
                'name' => 'EsnToken',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2023-04-04 11:39:58',
                'updated_at' => '2023-04-04 11:39:58',
                'expires_at' => '2024-04-04 11:39:58',
            ),
            4 => 
            array (
                'id' => '6caf2be81e6a3fa5c224b090a6f87acacc867409334d30a561b11945ac464f9b9bdbd451eb5338c6',
                'user_id' => 7,
                'client_id' => 1,
                'name' => 'EsnToken',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2023-04-04 10:40:13',
                'updated_at' => '2023-04-04 10:40:13',
                'expires_at' => '2024-04-04 10:40:13',
            ),
            5 => 
            array (
                'id' => '7223d54e92c1f4d316fe64c5c7d78dea82c10c9dde4ccfde0e35f094260c353158ad88ca4a7dfb0e',
                'user_id' => 6,
                'client_id' => 1,
                'name' => 'EsnToken',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2023-04-04 10:38:29',
                'updated_at' => '2023-04-04 10:38:29',
                'expires_at' => '2024-04-04 10:38:29',
            ),
            6 => 
            array (
                'id' => '9936d1786c4cf83a2fd1fdbdcdc43ce1f44bca62294f0fa60cf580f1518b1e8eeab0f4dad51745a5',
                'user_id' => 16,
                'client_id' => 1,
                'name' => 'EsnToken',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2023-04-05 05:07:19',
                'updated_at' => '2023-04-05 05:07:19',
                'expires_at' => '2024-04-05 05:07:19',
            ),
            7 => 
            array (
                'id' => 'a3a94cee12446e50b3bee9d1700b4b89a8ae5cd226d116bd96e028ed180b45a64d3885999138092d',
                'user_id' => 9,
                'client_id' => 1,
                'name' => 'EsnToken',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2023-04-04 11:02:03',
                'updated_at' => '2023-04-04 11:02:03',
                'expires_at' => '2024-04-04 11:02:03',
            ),
            8 => 
            array (
                'id' => 'c663088806813b4ee88f28921fbb262910889ad121134c1f3a7e6e7e8b89712c7bf88a85bbea1c5b',
                'user_id' => 15,
                'client_id' => 1,
                'name' => 'EsnToken',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2023-04-05 05:06:02',
                'updated_at' => '2023-04-05 05:06:02',
                'expires_at' => '2024-04-05 05:06:02',
            ),
            9 => 
            array (
                'id' => 'd019ce2688e9beba622699a0555b951c30ad99b9ced84d330ee125bb8d0c3b88f41b53a007d1e6be',
                'user_id' => 8,
                'client_id' => 1,
                'name' => 'EsnToken',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2023-04-04 10:49:33',
                'updated_at' => '2023-04-04 10:49:33',
                'expires_at' => '2024-04-04 10:49:33',
            ),
            10 => 
            array (
                'id' => 'd121466122a0f139a75fd6349c55cbd922f242a0edec248f91756b022da82dd16d8b1976d9dddb29',
                'user_id' => 5,
                'client_id' => 1,
                'name' => 'EsnToken',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2023-04-04 09:11:02',
                'updated_at' => '2023-04-04 09:11:02',
                'expires_at' => '2024-04-04 09:11:02',
            ),
            11 => 
            array (
                'id' => 'ddbd96656ddac089491cfc920c2faf0ed9fb38817409c2735ce54e5847c510b32bd6a5ee96bf2ca4',
                'user_id' => 10,
                'client_id' => 1,
                'name' => 'EsnToken',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2023-04-04 11:06:24',
                'updated_at' => '2023-04-04 11:06:24',
                'expires_at' => '2024-04-04 11:06:24',
            ),
            12 => 
            array (
                'id' => 'eb5079b44790a4724c5a05991dc92028f61200408507c5f2c9d01858dde0af1b38bdba0da3299b8a',
                'user_id' => 14,
                'client_id' => 1,
                'name' => 'EsnToken',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2023-04-05 05:04:54',
                'updated_at' => '2023-04-05 05:04:54',
                'expires_at' => '2024-04-05 05:04:54',
            ),
        ));
        
        
    }
}