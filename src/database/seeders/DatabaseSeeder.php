<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategoriesTableSeeder::class,
            DataRowsTableSeeder::class,
            DataTypesTableSeeder::class,
            FailedJobsTableSeeder::class,
            MenusTableSeeder::class,
            MenuItemsTableSeeder::class,
            PagesTableSeeder::class,
            PermissionsTableSeeder::class,
            PermissionRoleTableSeeder::class,
            PersonalAccessTokensTableSeeder::class,
            PostsTableSeeder::class,
            UsersTableSeeder::class,
            RolesTableSeeder::class,
            SettingsTableSeeder::class,
            TranslationsTableSeeder::class,
            UserRolesTableSeeder::class,
            StatusesTableSeeder::class,
            MemberRolesTableSeeder::class,
            CountriesTableSeeder::class,
        ]);
    }
}
