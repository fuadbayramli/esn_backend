<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('settings')->delete();
        
        DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'site.title',
                'display_name' => 'Site Title',
                'value' => 'Site Title',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Site',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'site.description',
                'display_name' => 'Site Description',
                'value' => 'Site Description',
                'details' => '',
                'type' => 'text',
                'order' => 2,
                'group' => 'Site',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'site.logo',
                'display_name' => 'Site Logo',
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 3,
                'group' => 'Site',
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'site.google_analytics_tracking_id',
                'display_name' => 'Google Analytics Tracking ID',
                'value' => '',
                'details' => '',
                'type' => 'text',
                'order' => 4,
                'group' => 'Site',
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'admin.bg_image',
                'display_name' => 'Admin Background Image',
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 5,
                'group' => 'Admin',
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'admin.title',
                'display_name' => 'Admin Title',
                'value' => 'Voyager',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Admin',
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'admin.description',
                'display_name' => 'Admin Description',
                'value' => 'Welcome to Voyager. The Missing Admin for Laravel',
                'details' => '',
                'type' => 'text',
                'order' => 2,
                'group' => 'Admin',
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'admin.loader',
                'display_name' => 'Admin Loader',
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 3,
                'group' => 'Admin',
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'admin.icon_image',
                'display_name' => 'Admin Icon Image',
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 4,
                'group' => 'Admin',
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'admin.google_analytics_client_id',
            'display_name' => 'Google Analytics Client ID (used for admin dashboard)',
                'value' => '',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Admin',
            ),
            10 => 
            array (
                'id' => 11,
                'key' => 'site.main_page_title',
                'display_name' => 'Main page header title',
                'value' => '',
                'details' => NULL,
                'type' => 'text',
                'order' => 6,
                'group' => 'Site',
            ),
            11 => 
            array (
                'id' => 12,
                'key' => 'site.main_page_chapter_text',
                'display_name' => 'Main page national chapter text',
                'value' => '',
                'details' => NULL,
                'type' => 'text_area',
                'order' => 7,
                'group' => 'Site',
            ),
            12 => 
            array (
                'id' => 13,
                'key' => 'site.who_we_are_title',
                'display_name' => 'Who we are title',
                'value' => '',
                'details' => NULL,
                'type' => 'text',
                'order' => 8,
                'group' => 'Site',
            ),
            13 => 
            array (
                'id' => 14,
                'key' => 'site.who_we_are_text',
                'display_name' => 'Who we are text',
                'value' => '',
                'details' => NULL,
                'type' => 'text_area',
                'order' => 9,
                'group' => 'Site',
            ),
            14 => 
            array (
                'id' => 15,
                'key' => 'site.short_history_1_title',
                'display_name' => 'Short fact history 1 title',
                'value' => '',
                'details' => NULL,
                'type' => 'text',
                'order' => 10,
                'group' => 'Site',
            ),
            15 => 
            array (
                'id' => 16,
                'key' => 'site.short_history_2_title',
                'display_name' => 'Short fact history 2 title',
                'value' => '',
                'details' => NULL,
                'type' => 'text',
                'order' => 11,
                'group' => 'Site',
            ),
            16 => 
            array (
                'id' => 17,
                'key' => 'site.short_history_1_text',
                'display_name' => 'Short fact history 1 text',
                'value' => '',
                'details' => NULL,
                'type' => 'text',
                'order' => 12,
                'group' => 'Site',
            ),
            17 => 
            array (
                'id' => 18,
                'key' => 'site.short_history_2_text',
                'display_name' => 'Short fact history 2 text',
                'value' => '',
                'details' => NULL,
                'type' => 'text',
                'order' => 13,
                'group' => 'Site',
            ),
            18 => 
            array (
                'id' => 19,
                'key' => 'site.our_mission_text',
                'display_name' => 'Our mission text',
                'value' => '',
                'details' => NULL,
                'type' => 'text_area',
                'order' => 14,
                'group' => 'Site',
            ),
            19 => 
            array (
                'id' => 20,
                'key' => 'site.our_mission_image',
                'display_name' => 'Our mission image',
                'value' => '',
                'details' => NULL,
                'type' => 'image',
                'order' => 15,
                'group' => 'Site',
            ),
            20 => 
            array (
                'id' => 21,
                'key' => 'site.become_part_text',
                'display_name' => 'Become part of Nam Youth text',
                'value' => '',
                'details' => NULL,
                'type' => 'text_area',
                'order' => 16,
                'group' => 'Site',
            ),
            21 => 
            array (
                'id' => 22,
                'key' => 'site.become_part_image',
                'display_name' => 'Become part of Nam Youth image',
                'value' => '',
                'details' => NULL,
                'type' => 'image',
                'order' => 17,
                'group' => 'Site',
            ),
            22 => 
            array (
                'id' => 23,
                'key' => 'site.our_numbers_text',
                'display_name' => 'Our numbers text',
                'value' => '',
                'details' => NULL,
                'type' => 'text',
                'order' => 18,
                'group' => 'Site',
            ),
            23 => 
            array (
                'id' => 24,
                'key' => 'site.our_numbers_1_title',
                'display_name' => 'Our numbers 1 title',
                'value' => '',
                'details' => NULL,
                'type' => 'text',
                'order' => 19,
                'group' => 'Site',
            ),
            24 => 
            array (
                'id' => 25,
                'key' => 'site.our_numbers_2_title',
                'display_name' => 'Our numbers 2 title',
                'value' => '',
                'details' => NULL,
                'type' => 'text',
                'order' => 20,
                'group' => 'Site',
            ),
            25 => 
            array (
                'id' => 26,
                'key' => 'site.our_numbers_3_title',
                'display_name' => 'Our numbers 3 title',
                'value' => '',
                'details' => NULL,
                'type' => 'text',
                'order' => 21,
                'group' => 'Site',
            ),
            26 => 
            array (
                'id' => 27,
                'key' => 'site.our_numbers_1',
                'display_name' => 'Our numbers 1',
                'value' => '',
                'details' => NULL,
                'type' => 'text',
                'order' => 22,
                'group' => 'Site',
            ),
            27 => 
            array (
                'id' => 28,
                'key' => 'site.our_numbers_2',
                'display_name' => 'Our numbers 2',
                'value' => '',
                'details' => NULL,
                'type' => 'text',
                'order' => 23,
                'group' => 'Site',
            ),
            28 => 
            array (
                'id' => 29,
                'key' => 'site.our_numbers_3',
                'display_name' => 'Our numbers 3',
                'value' => '',
                'details' => NULL,
                'type' => 'text',
                'order' => 24,
                'group' => 'Site',
            ),
            29 => 
            array (
                'id' => 30,
                'key' => 'site.our_numbers_1_text',
                'display_name' => 'Our numbers 1 text',
                'value' => '',
                'details' => NULL,
                'type' => 'text_area',
                'order' => 25,
                'group' => 'Site',
            ),
            30 => 
            array (
                'id' => 31,
                'key' => 'site.our_numbers_2_text',
                'display_name' => 'Our numbers 2 text',
                'value' => '',
                'details' => NULL,
                'type' => 'text_area',
                'order' => 26,
                'group' => 'Site',
            ),
            31 => 
            array (
                'id' => 32,
                'key' => 'site.our_numbers_3_text',
                'display_name' => 'Our numbers 3 text',
                'value' => '',
                'details' => NULL,
                'type' => 'text_area',
                'order' => 27,
                'group' => 'Site',
            ),
            32 => 
            array (
                'id' => 33,
                'key' => 'site.subscribe_text',
                'display_name' => 'Subscribe text',
                'value' => '',
                'details' => NULL,
                'type' => 'text',
                'order' => 28,
                'group' => 'Site',
            ),
            33 => 
            array (
                'id' => 34,
                'key' => 'site.testimonial_text',
                'display_name' => 'Testimonial text',
                'value' => '',
                'details' => NULL,
                'type' => 'text_area',
                'order' => 29,
                'group' => 'Site',
            ),
        ));
        
        
    }
}