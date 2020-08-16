<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10) . '@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);

        DB::table('users')->insert([
            [
                'name' => 'user1',
                'email' => 'user1@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$d8gCDUiWFJPoI7EvDS699eNwXf/lO63JmQ9J8l2fJ3fTsg7lozzwG',
                'avatarImgFileName' => 'avatar1-picture.png'
            ],
            [
                'name' => 'user2',
                'email' => 'user2@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$d8gCDUiWFJPoI7EvDS699eNwXf/lO63JmQ9J8l2fJ3fTsg7lozzwG',
                'avatarImgFileName' => 'avatar2-picture.png'
            ],
            [
                'name' => 'user3',
                'email' => 'user3@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$d8gCDUiWFJPoI7EvDS699eNwXf/lO63JmQ9J8l2fJ3fTsg7lozzwG',
                'avatarImgFileName' => 'avatar3-picture.png'
            ],
        ]);
    }
}
