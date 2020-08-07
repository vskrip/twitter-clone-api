<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserPicturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_pictures')->insert([
            [
                'user_id' => 1,
                'path' => 'user1-picture.png',
                'alt' => 'User1 Profile Picture',
            ],
            [
                'user_id' => 2,
                'path' => 'user2-picture.png',
                'alt' => 'User2 Profile Picture',
            ],
            [
                'user_id' => 3,
                'path' => 'user3-picture.png',
                'alt' => 'User3 Profile Picture',
            ],
        ]);
    }
}
