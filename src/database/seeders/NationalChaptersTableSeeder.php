<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NationalChaptersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('national_chapters')->delete();

        DB::table('national_chapters')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'USA',
                'user_id' => 2,
                'phone' => '+994 9595 95 95 95',
                'email' => 'codega.az@gmail.com',
                'flag' => 'national-chapters/April2023/SM0501Yd95XGy0UUutSx.png',
                'address' => 'as dasd asd',
                'website' => 'https://google.com',
                'ins' => 'https://instagram.com',
                'fb' => 'https://facebook.com',
                'linkedin' => 'https://linkedin.com',
                'tel' => 'https://,telegram.com',
                'yt' => 'https://youtube.com',
                'twitter_feed' => 'https://twitter.com',
                'instagram_feed' => 'https://instagram.com',
                'longitude' => '44.60',
                'latitude' => '95.96',
                'created_at' => '2023-04-03 16:19:00',
                'updated_at' => '2023-04-04 06:38:19',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'UK',
                'user_id' => 1,
                'phone' => '+994 9595 95 95 95',
                'email' => 'codega.az@gmail.com',
                'flag' => 'national-chapters/April2023/SM0501Yd95XGy0UUutSx.png',
                'address' => 'as dasd asd',
                'website' => 'https://google.com',
                'ins' => 'https://instagram.com',
                'fb' => 'https://facebook.com',
                'linkedin' => 'https://linkedin.com',
                'tel' => 'https://,telegram.com',
                'yt' => 'https://youtube.com',
                'twitter_feed' => 'https://twitter.com',
                'instagram_feed' => 'https://instagram.com',
                'longitude' => '44.60',
                'latitude' => '95.96',
                'created_at' => '2023-04-03 16:19:00',
                'updated_at' => '2023-04-03 12:19:59',
                'deleted_at' => NULL,
            ),
        ));


    }
}
