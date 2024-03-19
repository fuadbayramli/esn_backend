<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('permissions')->delete();
        
        DB::table('permissions')->insert(array (
            0 => 
            array (
                'created_at' => '2023-04-03 06:16:19',
                'id' => 1,
                'key' => 'browse_admin',
                'table_name' => NULL,
                'updated_at' => '2023-04-03 06:16:19',
            ),
            1 => 
            array (
                'created_at' => '2023-04-03 06:16:19',
                'id' => 2,
                'key' => 'browse_bread',
                'table_name' => NULL,
                'updated_at' => '2023-04-03 06:16:19',
            ),
            2 => 
            array (
                'created_at' => '2023-04-03 06:16:19',
                'id' => 3,
                'key' => 'browse_database',
                'table_name' => NULL,
                'updated_at' => '2023-04-03 06:16:19',
            ),
            3 => 
            array (
                'created_at' => '2023-04-03 06:16:19',
                'id' => 4,
                'key' => 'browse_media',
                'table_name' => NULL,
                'updated_at' => '2023-04-03 06:16:19',
            ),
            4 => 
            array (
                'created_at' => '2023-04-03 06:16:19',
                'id' => 5,
                'key' => 'browse_compass',
                'table_name' => NULL,
                'updated_at' => '2023-04-03 06:16:19',
            ),
            5 => 
            array (
                'created_at' => '2023-04-03 06:16:19',
                'id' => 6,
                'key' => 'browse_menus',
                'table_name' => 'menus',
                'updated_at' => '2023-04-03 06:16:19',
            ),
            6 => 
            array (
                'created_at' => '2023-04-03 06:16:19',
                'id' => 7,
                'key' => 'read_menus',
                'table_name' => 'menus',
                'updated_at' => '2023-04-03 06:16:19',
            ),
            7 => 
            array (
                'created_at' => '2023-04-03 06:16:19',
                'id' => 8,
                'key' => 'edit_menus',
                'table_name' => 'menus',
                'updated_at' => '2023-04-03 06:16:19',
            ),
            8 => 
            array (
                'created_at' => '2023-04-03 06:16:19',
                'id' => 9,
                'key' => 'add_menus',
                'table_name' => 'menus',
                'updated_at' => '2023-04-03 06:16:19',
            ),
            9 => 
            array (
                'created_at' => '2023-04-03 06:16:19',
                'id' => 10,
                'key' => 'delete_menus',
                'table_name' => 'menus',
                'updated_at' => '2023-04-03 06:16:19',
            ),
            10 => 
            array (
                'created_at' => '2023-04-03 06:16:19',
                'id' => 11,
                'key' => 'browse_roles',
                'table_name' => 'roles',
                'updated_at' => '2023-04-03 06:16:19',
            ),
            11 => 
            array (
                'created_at' => '2023-04-03 06:16:19',
                'id' => 12,
                'key' => 'read_roles',
                'table_name' => 'roles',
                'updated_at' => '2023-04-03 06:16:19',
            ),
            12 => 
            array (
                'created_at' => '2023-04-03 06:16:19',
                'id' => 13,
                'key' => 'edit_roles',
                'table_name' => 'roles',
                'updated_at' => '2023-04-03 06:16:19',
            ),
            13 => 
            array (
                'created_at' => '2023-04-03 06:16:19',
                'id' => 14,
                'key' => 'add_roles',
                'table_name' => 'roles',
                'updated_at' => '2023-04-03 06:16:19',
            ),
            14 => 
            array (
                'created_at' => '2023-04-03 06:16:19',
                'id' => 15,
                'key' => 'delete_roles',
                'table_name' => 'roles',
                'updated_at' => '2023-04-03 06:16:19',
            ),
            15 => 
            array (
                'created_at' => '2023-04-03 06:16:19',
                'id' => 16,
                'key' => 'browse_users',
                'table_name' => 'users',
                'updated_at' => '2023-04-03 06:16:19',
            ),
            16 => 
            array (
                'created_at' => '2023-04-03 06:16:19',
                'id' => 17,
                'key' => 'read_users',
                'table_name' => 'users',
                'updated_at' => '2023-04-03 06:16:19',
            ),
            17 => 
            array (
                'created_at' => '2023-04-03 06:16:19',
                'id' => 18,
                'key' => 'edit_users',
                'table_name' => 'users',
                'updated_at' => '2023-04-03 06:16:19',
            ),
            18 => 
            array (
                'created_at' => '2023-04-03 06:16:19',
                'id' => 19,
                'key' => 'add_users',
                'table_name' => 'users',
                'updated_at' => '2023-04-03 06:16:19',
            ),
            19 => 
            array (
                'created_at' => '2023-04-03 06:16:19',
                'id' => 20,
                'key' => 'delete_users',
                'table_name' => 'users',
                'updated_at' => '2023-04-03 06:16:19',
            ),
            20 => 
            array (
                'created_at' => '2023-04-03 06:16:19',
                'id' => 21,
                'key' => 'browse_settings',
                'table_name' => 'settings',
                'updated_at' => '2023-04-03 06:16:19',
            ),
            21 => 
            array (
                'created_at' => '2023-04-03 06:16:19',
                'id' => 22,
                'key' => 'read_settings',
                'table_name' => 'settings',
                'updated_at' => '2023-04-03 06:16:19',
            ),
            22 => 
            array (
                'created_at' => '2023-04-03 06:16:19',
                'id' => 23,
                'key' => 'edit_settings',
                'table_name' => 'settings',
                'updated_at' => '2023-04-03 06:16:19',
            ),
            23 => 
            array (
                'created_at' => '2023-04-03 06:16:19',
                'id' => 24,
                'key' => 'add_settings',
                'table_name' => 'settings',
                'updated_at' => '2023-04-03 06:16:19',
            ),
            24 => 
            array (
                'created_at' => '2023-04-03 06:16:19',
                'id' => 25,
                'key' => 'delete_settings',
                'table_name' => 'settings',
                'updated_at' => '2023-04-03 06:16:19',
            ),
            25 => 
            array (
                'created_at' => '2023-04-03 06:16:20',
                'id' => 26,
                'key' => 'browse_categories',
                'table_name' => 'categories',
                'updated_at' => '2023-04-03 06:16:20',
            ),
            26 => 
            array (
                'created_at' => '2023-04-03 06:16:20',
                'id' => 27,
                'key' => 'read_categories',
                'table_name' => 'categories',
                'updated_at' => '2023-04-03 06:16:20',
            ),
            27 => 
            array (
                'created_at' => '2023-04-03 06:16:20',
                'id' => 28,
                'key' => 'edit_categories',
                'table_name' => 'categories',
                'updated_at' => '2023-04-03 06:16:20',
            ),
            28 => 
            array (
                'created_at' => '2023-04-03 06:16:20',
                'id' => 29,
                'key' => 'add_categories',
                'table_name' => 'categories',
                'updated_at' => '2023-04-03 06:16:20',
            ),
            29 => 
            array (
                'created_at' => '2023-04-03 06:16:20',
                'id' => 30,
                'key' => 'delete_categories',
                'table_name' => 'categories',
                'updated_at' => '2023-04-03 06:16:20',
            ),
            30 => 
            array (
                'created_at' => '2023-04-03 06:16:20',
                'id' => 31,
                'key' => 'browse_posts',
                'table_name' => 'posts',
                'updated_at' => '2023-04-03 06:16:20',
            ),
            31 => 
            array (
                'created_at' => '2023-04-03 06:16:20',
                'id' => 32,
                'key' => 'read_posts',
                'table_name' => 'posts',
                'updated_at' => '2023-04-03 06:16:20',
            ),
            32 => 
            array (
                'created_at' => '2023-04-03 06:16:20',
                'id' => 33,
                'key' => 'edit_posts',
                'table_name' => 'posts',
                'updated_at' => '2023-04-03 06:16:20',
            ),
            33 => 
            array (
                'created_at' => '2023-04-03 06:16:20',
                'id' => 34,
                'key' => 'add_posts',
                'table_name' => 'posts',
                'updated_at' => '2023-04-03 06:16:20',
            ),
            34 => 
            array (
                'created_at' => '2023-04-03 06:16:20',
                'id' => 35,
                'key' => 'delete_posts',
                'table_name' => 'posts',
                'updated_at' => '2023-04-03 06:16:20',
            ),
            35 => 
            array (
                'created_at' => '2023-04-03 06:16:20',
                'id' => 36,
                'key' => 'browse_pages',
                'table_name' => 'pages',
                'updated_at' => '2023-04-03 06:16:20',
            ),
            36 => 
            array (
                'created_at' => '2023-04-03 06:16:20',
                'id' => 37,
                'key' => 'read_pages',
                'table_name' => 'pages',
                'updated_at' => '2023-04-03 06:16:20',
            ),
            37 => 
            array (
                'created_at' => '2023-04-03 06:16:20',
                'id' => 38,
                'key' => 'edit_pages',
                'table_name' => 'pages',
                'updated_at' => '2023-04-03 06:16:20',
            ),
            38 => 
            array (
                'created_at' => '2023-04-03 06:16:20',
                'id' => 39,
                'key' => 'add_pages',
                'table_name' => 'pages',
                'updated_at' => '2023-04-03 06:16:20',
            ),
            39 => 
            array (
                'created_at' => '2023-04-03 06:16:20',
                'id' => 40,
                'key' => 'delete_pages',
                'table_name' => 'pages',
                'updated_at' => '2023-04-03 06:16:20',
            ),
            40 => 
            array (
                'created_at' => '2023-04-03 10:55:35',
                'id' => 41,
                'key' => 'browse_national_chapters',
                'table_name' => 'national_chapters',
                'updated_at' => '2023-04-03 10:55:35',
            ),
            41 => 
            array (
                'created_at' => '2023-04-03 10:55:35',
                'id' => 42,
                'key' => 'read_national_chapters',
                'table_name' => 'national_chapters',
                'updated_at' => '2023-04-03 10:55:35',
            ),
            42 => 
            array (
                'created_at' => '2023-04-03 10:55:35',
                'id' => 43,
                'key' => 'edit_national_chapters',
                'table_name' => 'national_chapters',
                'updated_at' => '2023-04-03 10:55:35',
            ),
            43 => 
            array (
                'created_at' => '2023-04-03 10:55:35',
                'id' => 44,
                'key' => 'add_national_chapters',
                'table_name' => 'national_chapters',
                'updated_at' => '2023-04-03 10:55:35',
            ),
            44 => 
            array (
                'created_at' => '2023-04-03 10:55:35',
                'id' => 45,
                'key' => 'delete_national_chapters',
                'table_name' => 'national_chapters',
                'updated_at' => '2023-04-03 10:55:35',
            ),
            45 => 
            array (
                'created_at' => '2023-04-03 12:44:47',
                'id' => 46,
                'key' => 'browse_members',
                'table_name' => 'members',
                'updated_at' => '2023-04-03 12:44:47',
            ),
            46 => 
            array (
                'created_at' => '2023-04-03 12:44:47',
                'id' => 47,
                'key' => 'read_members',
                'table_name' => 'members',
                'updated_at' => '2023-04-03 12:44:47',
            ),
            47 => 
            array (
                'created_at' => '2023-04-03 12:44:47',
                'id' => 48,
                'key' => 'edit_members',
                'table_name' => 'members',
                'updated_at' => '2023-04-03 12:44:47',
            ),
            48 => 
            array (
                'created_at' => '2023-04-03 12:44:47',
                'id' => 49,
                'key' => 'add_members',
                'table_name' => 'members',
                'updated_at' => '2023-04-03 12:44:47',
            ),
            49 => 
            array (
                'created_at' => '2023-04-03 12:44:47',
                'id' => 50,
                'key' => 'delete_members',
                'table_name' => 'members',
                'updated_at' => '2023-04-03 12:44:47',
            ),
            50 => 
            array (
                'created_at' => '2023-04-11 09:26:07',
                'id' => 51,
                'key' => 'browse_countries',
                'table_name' => 'countries',
                'updated_at' => '2023-04-11 09:26:07',
            ),
            51 => 
            array (
                'created_at' => '2023-04-11 09:26:07',
                'id' => 52,
                'key' => 'read_countries',
                'table_name' => 'countries',
                'updated_at' => '2023-04-11 09:26:07',
            ),
            52 => 
            array (
                'created_at' => '2023-04-11 09:26:07',
                'id' => 53,
                'key' => 'edit_countries',
                'table_name' => 'countries',
                'updated_at' => '2023-04-11 09:26:07',
            ),
            53 => 
            array (
                'created_at' => '2023-04-11 09:26:07',
                'id' => 54,
                'key' => 'add_countries',
                'table_name' => 'countries',
                'updated_at' => '2023-04-11 09:26:07',
            ),
            54 => 
            array (
                'created_at' => '2023-04-11 09:26:07',
                'id' => 55,
                'key' => 'delete_countries',
                'table_name' => 'countries',
                'updated_at' => '2023-04-11 09:26:07',
            ),
            55 => 
            array (
                'created_at' => '2023-04-11 09:55:10',
                'id' => 56,
                'key' => 'browse_member_roles',
                'table_name' => 'member_roles',
                'updated_at' => '2023-04-11 09:55:10',
            ),
            56 => 
            array (
                'created_at' => '2023-04-11 09:55:10',
                'id' => 57,
                'key' => 'read_member_roles',
                'table_name' => 'member_roles',
                'updated_at' => '2023-04-11 09:55:10',
            ),
            57 => 
            array (
                'created_at' => '2023-04-11 09:55:10',
                'id' => 58,
                'key' => 'edit_member_roles',
                'table_name' => 'member_roles',
                'updated_at' => '2023-04-11 09:55:10',
            ),
            58 => 
            array (
                'created_at' => '2023-04-11 09:55:10',
                'id' => 59,
                'key' => 'add_member_roles',
                'table_name' => 'member_roles',
                'updated_at' => '2023-04-11 09:55:10',
            ),
            59 => 
            array (
                'created_at' => '2023-04-11 09:55:10',
                'id' => 60,
                'key' => 'delete_member_roles',
                'table_name' => 'member_roles',
                'updated_at' => '2023-04-11 09:55:10',
            ),
            60 => 
            array (
                'created_at' => '2023-04-13 08:01:34',
                'id' => 61,
                'key' => 'browse_news',
                'table_name' => 'news',
                'updated_at' => '2023-04-13 08:01:34',
            ),
            61 => 
            array (
                'created_at' => '2023-04-13 08:01:34',
                'id' => 62,
                'key' => 'read_news',
                'table_name' => 'news',
                'updated_at' => '2023-04-13 08:01:34',
            ),
            62 => 
            array (
                'created_at' => '2023-04-13 08:01:34',
                'id' => 63,
                'key' => 'edit_news',
                'table_name' => 'news',
                'updated_at' => '2023-04-13 08:01:34',
            ),
            63 => 
            array (
                'created_at' => '2023-04-13 08:01:34',
                'id' => 64,
                'key' => 'add_news',
                'table_name' => 'news',
                'updated_at' => '2023-04-13 08:01:34',
            ),
            64 => 
            array (
                'created_at' => '2023-04-13 08:01:34',
                'id' => 65,
                'key' => 'delete_news',
                'table_name' => 'news',
                'updated_at' => '2023-04-13 08:01:34',
            ),
            65 => 
            array (
                'created_at' => '2023-04-17 07:30:58',
                'id' => 66,
                'key' => 'browse_contact_messages',
                'table_name' => 'contact_messages',
                'updated_at' => '2023-04-17 07:30:58',
            ),
            66 => 
            array (
                'created_at' => '2023-04-17 07:30:58',
                'id' => 67,
                'key' => 'read_contact_messages',
                'table_name' => 'contact_messages',
                'updated_at' => '2023-04-17 07:30:58',
            ),
            67 => 
            array (
                'created_at' => '2023-04-17 07:30:58',
                'id' => 68,
                'key' => 'edit_contact_messages',
                'table_name' => 'contact_messages',
                'updated_at' => '2023-04-17 07:30:58',
            ),
            68 => 
            array (
                'created_at' => '2023-04-17 07:30:58',
                'id' => 69,
                'key' => 'add_contact_messages',
                'table_name' => 'contact_messages',
                'updated_at' => '2023-04-17 07:30:58',
            ),
            69 => 
            array (
                'created_at' => '2023-04-17 07:30:58',
                'id' => 70,
                'key' => 'delete_contact_messages',
                'table_name' => 'contact_messages',
                'updated_at' => '2023-04-17 07:30:58',
            ),
            70 => 
            array (
                'created_at' => '2023-04-17 12:48:22',
                'id' => 71,
                'key' => 'browse_abouts',
                'table_name' => 'abouts',
                'updated_at' => '2023-04-17 12:48:22',
            ),
            71 => 
            array (
                'created_at' => '2023-04-17 12:48:22',
                'id' => 72,
                'key' => 'read_abouts',
                'table_name' => 'abouts',
                'updated_at' => '2023-04-17 12:48:22',
            ),
            72 => 
            array (
                'created_at' => '2023-04-17 12:48:22',
                'id' => 73,
                'key' => 'edit_abouts',
                'table_name' => 'abouts',
                'updated_at' => '2023-04-17 12:48:22',
            ),
            73 => 
            array (
                'created_at' => '2023-04-17 12:48:22',
                'id' => 74,
                'key' => 'add_abouts',
                'table_name' => 'abouts',
                'updated_at' => '2023-04-17 12:48:22',
            ),
            74 => 
            array (
                'created_at' => '2023-04-17 12:48:22',
                'id' => 75,
                'key' => 'delete_abouts',
                'table_name' => 'abouts',
                'updated_at' => '2023-04-17 12:48:22',
            ),
            75 => 
            array (
                'created_at' => '2023-04-18 05:40:26',
                'id' => 76,
                'key' => 'browse_concepts',
                'table_name' => 'concepts',
                'updated_at' => '2023-04-18 05:40:26',
            ),
            76 => 
            array (
                'created_at' => '2023-04-18 05:40:26',
                'id' => 77,
                'key' => 'read_concepts',
                'table_name' => 'concepts',
                'updated_at' => '2023-04-18 05:40:26',
            ),
            77 => 
            array (
                'created_at' => '2023-04-18 05:40:26',
                'id' => 78,
                'key' => 'edit_concepts',
                'table_name' => 'concepts',
                'updated_at' => '2023-04-18 05:40:26',
            ),
            78 => 
            array (
                'created_at' => '2023-04-18 05:40:26',
                'id' => 79,
                'key' => 'add_concepts',
                'table_name' => 'concepts',
                'updated_at' => '2023-04-18 05:40:26',
            ),
            79 => 
            array (
                'created_at' => '2023-04-18 05:40:26',
                'id' => 80,
                'key' => 'delete_concepts',
                'table_name' => 'concepts',
                'updated_at' => '2023-04-18 05:40:26',
            ),
            80 => 
            array (
                'created_at' => '2023-04-18 05:58:44',
                'id' => 81,
                'key' => 'browse_timelines',
                'table_name' => 'timelines',
                'updated_at' => '2023-04-18 05:58:44',
            ),
            81 => 
            array (
                'created_at' => '2023-04-18 05:58:44',
                'id' => 82,
                'key' => 'read_timelines',
                'table_name' => 'timelines',
                'updated_at' => '2023-04-18 05:58:44',
            ),
            82 => 
            array (
                'created_at' => '2023-04-18 05:58:44',
                'id' => 83,
                'key' => 'edit_timelines',
                'table_name' => 'timelines',
                'updated_at' => '2023-04-18 05:58:44',
            ),
            83 => 
            array (
                'created_at' => '2023-04-18 05:58:44',
                'id' => 84,
                'key' => 'add_timelines',
                'table_name' => 'timelines',
                'updated_at' => '2023-04-18 05:58:44',
            ),
            84 => 
            array (
                'created_at' => '2023-04-18 05:58:44',
                'id' => 85,
                'key' => 'delete_timelines',
                'table_name' => 'timelines',
                'updated_at' => '2023-04-18 05:58:44',
            ),
            85 => 
            array (
                'created_at' => '2023-04-25 10:38:57',
                'id' => 86,
                'key' => 'browse_faqs',
                'table_name' => 'faqs',
                'updated_at' => '2023-04-25 10:38:57',
            ),
            86 => 
            array (
                'created_at' => '2023-04-25 10:38:57',
                'id' => 87,
                'key' => 'read_faqs',
                'table_name' => 'faqs',
                'updated_at' => '2023-04-25 10:38:57',
            ),
            87 => 
            array (
                'created_at' => '2023-04-25 10:38:57',
                'id' => 88,
                'key' => 'edit_faqs',
                'table_name' => 'faqs',
                'updated_at' => '2023-04-25 10:38:57',
            ),
            88 => 
            array (
                'created_at' => '2023-04-25 10:38:57',
                'id' => 89,
                'key' => 'add_faqs',
                'table_name' => 'faqs',
                'updated_at' => '2023-04-25 10:38:57',
            ),
            89 => 
            array (
                'created_at' => '2023-04-25 10:38:57',
                'id' => 90,
                'key' => 'delete_faqs',
                'table_name' => 'faqs',
                'updated_at' => '2023-04-25 10:38:57',
            ),
            90 => 
            array (
                'created_at' => '2023-04-26 13:09:04',
                'id' => 91,
                'key' => 'browse_testimonials',
                'table_name' => 'testimonials',
                'updated_at' => '2023-04-26 13:09:04',
            ),
            91 => 
            array (
                'created_at' => '2023-04-26 13:09:04',
                'id' => 92,
                'key' => 'read_testimonials',
                'table_name' => 'testimonials',
                'updated_at' => '2023-04-26 13:09:04',
            ),
            92 => 
            array (
                'created_at' => '2023-04-26 13:09:04',
                'id' => 93,
                'key' => 'edit_testimonials',
                'table_name' => 'testimonials',
                'updated_at' => '2023-04-26 13:09:04',
            ),
            93 => 
            array (
                'created_at' => '2023-04-26 13:09:04',
                'id' => 94,
                'key' => 'add_testimonials',
                'table_name' => 'testimonials',
                'updated_at' => '2023-04-26 13:09:04',
            ),
            94 => 
            array (
                'created_at' => '2023-04-26 13:09:04',
                'id' => 95,
                'key' => 'delete_testimonials',
                'table_name' => 'testimonials',
                'updated_at' => '2023-04-26 13:09:04',
            ),
            95 => 
            array (
                'created_at' => '2023-05-05 12:24:04',
                'id' => 96,
                'key' => 'browse_role_member',
                'table_name' => 'role_member',
                'updated_at' => '2023-05-05 12:24:04',
            ),
            96 => 
            array (
                'created_at' => '2023-05-05 12:24:04',
                'id' => 97,
                'key' => 'read_role_member',
                'table_name' => 'role_member',
                'updated_at' => '2023-05-05 12:24:04',
            ),
            97 => 
            array (
                'created_at' => '2023-05-05 12:24:04',
                'id' => 98,
                'key' => 'edit_role_member',
                'table_name' => 'role_member',
                'updated_at' => '2023-05-05 12:24:04',
            ),
            98 => 
            array (
                'created_at' => '2023-05-05 12:24:04',
                'id' => 99,
                'key' => 'add_role_member',
                'table_name' => 'role_member',
                'updated_at' => '2023-05-05 12:24:04',
            ),
            99 => 
            array (
                'created_at' => '2023-05-05 12:24:04',
                'id' => 100,
                'key' => 'delete_role_member',
                'table_name' => 'role_member',
                'updated_at' => '2023-05-05 12:24:04',
            ),
            100 => 
            array (
                'created_at' => '2023-05-19 11:09:30',
                'id' => 101,
                'key' => 'browse_opportunities',
                'table_name' => 'opportunities',
                'updated_at' => '2023-05-19 11:09:30',
            ),
            101 => 
            array (
                'created_at' => '2023-05-19 11:09:30',
                'id' => 102,
                'key' => 'read_opportunities',
                'table_name' => 'opportunities',
                'updated_at' => '2023-05-19 11:09:30',
            ),
            102 => 
            array (
                'created_at' => '2023-05-19 11:09:30',
                'id' => 103,
                'key' => 'edit_opportunities',
                'table_name' => 'opportunities',
                'updated_at' => '2023-05-19 11:09:30',
            ),
            103 => 
            array (
                'created_at' => '2023-05-19 11:09:30',
                'id' => 104,
                'key' => 'add_opportunities',
                'table_name' => 'opportunities',
                'updated_at' => '2023-05-19 11:09:30',
            ),
            104 => 
            array (
                'created_at' => '2023-05-19 11:09:30',
                'id' => 105,
                'key' => 'delete_opportunities',
                'table_name' => 'opportunities',
                'updated_at' => '2023-05-19 11:09:30',
            ),
            105 => 
            array (
                'created_at' => '2023-06-05 14:58:14',
                'id' => 106,
                'key' => 'browse_board_members',
                'table_name' => 'board_members',
                'updated_at' => '2023-06-05 14:58:14',
            ),
            106 => 
            array (
                'created_at' => '2023-06-05 14:58:14',
                'id' => 107,
                'key' => 'read_board_members',
                'table_name' => 'board_members',
                'updated_at' => '2023-06-05 14:58:14',
            ),
            107 => 
            array (
                'created_at' => '2023-06-05 14:58:14',
                'id' => 108,
                'key' => 'edit_board_members',
                'table_name' => 'board_members',
                'updated_at' => '2023-06-05 14:58:14',
            ),
            108 => 
            array (
                'created_at' => '2023-06-05 14:58:14',
                'id' => 109,
                'key' => 'add_board_members',
                'table_name' => 'board_members',
                'updated_at' => '2023-06-05 14:58:14',
            ),
            109 => 
            array (
                'created_at' => '2023-06-05 14:58:14',
                'id' => 110,
                'key' => 'delete_board_members',
                'table_name' => 'board_members',
                'updated_at' => '2023-06-05 14:58:14',
            ),
            110 => 
            array (
                'created_at' => '2023-06-05 15:31:51',
                'id' => 111,
                'key' => 'browse_board_secretariats',
                'table_name' => 'board_secretariats',
                'updated_at' => '2023-06-05 15:31:51',
            ),
            111 => 
            array (
                'created_at' => '2023-06-05 15:31:51',
                'id' => 112,
                'key' => 'read_board_secretariats',
                'table_name' => 'board_secretariats',
                'updated_at' => '2023-06-05 15:31:51',
            ),
            112 => 
            array (
                'created_at' => '2023-06-05 15:31:51',
                'id' => 113,
                'key' => 'edit_board_secretariats',
                'table_name' => 'board_secretariats',
                'updated_at' => '2023-06-05 15:31:51',
            ),
            113 => 
            array (
                'created_at' => '2023-06-05 15:31:51',
                'id' => 114,
                'key' => 'add_board_secretariats',
                'table_name' => 'board_secretariats',
                'updated_at' => '2023-06-05 15:31:51',
            ),
            114 => 
            array (
                'created_at' => '2023-06-05 15:31:51',
                'id' => 115,
                'key' => 'delete_board_secretariats',
                'table_name' => 'board_secretariats',
                'updated_at' => '2023-06-05 15:31:51',
            ),
            115 => 
            array (
                'created_at' => '2023-06-05 15:49:38',
                'id' => 116,
                'key' => 'browse_projects',
                'table_name' => 'projects',
                'updated_at' => '2023-06-05 15:49:38',
            ),
            116 => 
            array (
                'created_at' => '2023-06-05 15:49:38',
                'id' => 117,
                'key' => 'read_projects',
                'table_name' => 'projects',
                'updated_at' => '2023-06-05 15:49:38',
            ),
            117 => 
            array (
                'created_at' => '2023-06-05 15:49:38',
                'id' => 118,
                'key' => 'edit_projects',
                'table_name' => 'projects',
                'updated_at' => '2023-06-05 15:49:38',
            ),
            118 => 
            array (
                'created_at' => '2023-06-05 15:49:38',
                'id' => 119,
                'key' => 'add_projects',
                'table_name' => 'projects',
                'updated_at' => '2023-06-05 15:49:38',
            ),
            119 => 
            array (
                'created_at' => '2023-06-05 15:49:38',
                'id' => 120,
                'key' => 'delete_projects',
                'table_name' => 'projects',
                'updated_at' => '2023-06-05 15:49:38',
            ),
            120 => 
            array (
                'created_at' => '2023-06-21 16:02:34',
                'id' => 121,
                'key' => 'browse_event_categories',
                'table_name' => 'event_categories',
                'updated_at' => '2023-06-21 16:02:34',
            ),
            121 => 
            array (
                'created_at' => '2023-06-21 16:02:34',
                'id' => 122,
                'key' => 'read_event_categories',
                'table_name' => 'event_categories',
                'updated_at' => '2023-06-21 16:02:34',
            ),
            122 => 
            array (
                'created_at' => '2023-06-21 16:02:34',
                'id' => 123,
                'key' => 'edit_event_categories',
                'table_name' => 'event_categories',
                'updated_at' => '2023-06-21 16:02:34',
            ),
            123 => 
            array (
                'created_at' => '2023-06-21 16:02:34',
                'id' => 124,
                'key' => 'add_event_categories',
                'table_name' => 'event_categories',
                'updated_at' => '2023-06-21 16:02:34',
            ),
            124 => 
            array (
                'created_at' => '2023-06-21 16:02:34',
                'id' => 125,
                'key' => 'delete_event_categories',
                'table_name' => 'event_categories',
                'updated_at' => '2023-06-21 16:02:34',
            ),
            125 => 
            array (
                'created_at' => '2023-06-21 16:32:34',
                'id' => 126,
                'key' => 'browse_events',
                'table_name' => 'events',
                'updated_at' => '2023-06-21 16:32:34',
            ),
            126 => 
            array (
                'created_at' => '2023-06-21 16:32:34',
                'id' => 127,
                'key' => 'read_events',
                'table_name' => 'events',
                'updated_at' => '2023-06-21 16:32:34',
            ),
            127 => 
            array (
                'created_at' => '2023-06-21 16:32:34',
                'id' => 128,
                'key' => 'edit_events',
                'table_name' => 'events',
                'updated_at' => '2023-06-21 16:32:34',
            ),
            128 => 
            array (
                'created_at' => '2023-06-21 16:32:34',
                'id' => 129,
                'key' => 'add_events',
                'table_name' => 'events',
                'updated_at' => '2023-06-21 16:32:34',
            ),
            129 => 
            array (
                'created_at' => '2023-06-21 16:32:34',
                'id' => 130,
                'key' => 'delete_events',
                'table_name' => 'events',
                'updated_at' => '2023-06-21 16:32:34',
            ),
        ));
        
        
    }
}