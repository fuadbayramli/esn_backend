<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member_roles')->insert([
            [
                'name' => 'Youth Representative',
            ],
            [
                'name' => 'National Board Member',
            ],
            [
                'name' => 'National Secretariat Member',
            ],
            [
                'name' => 'Communication Manager',
            ],
            [
                'name' => 'HR Manager',
            ],
            [
                'name' => 'Projects Manager',
            ],
            [
                'name' => 'Events Manager',
            ],
            [
                'name' => 'Manager',
            ],
            [
                'name' => 'Webmaster',
            ]
        ]);
    }
}
