<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TwittsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('twitts')->insert([
            [
                'user_id' => 1,
                'body' => 'Some test twitt from user 1 ...',
                'created_at' => date('Y-m-d H:i:s', strtotime('2020-04-20 02:35:00')),
                'updated_at' => date('Y-m-d H:i:s', strtotime('2020-04-20 02:35:00')),

            ],
            [
                'user_id' => 2,
                'body' => 'Some test twitt from user 2 ...',
                'created_at' => date('Y-m-d H:i:s', strtotime('2020-04-23 05:55:00')),
                'updated_at' => date('Y-m-d H:i:s', strtotime('2020-04-24 06:30:00')),
            ],
            [
                'user_id' => 3,
                'body' => 'Some test twitt from user 3 ...',
                'created_at' => date('Y-m-d H:i:s', strtotime('2020-04-26 03:33:00')),
                'updated_at' => date('Y-m-d H:i:s', strtotime('2020-04-26 04:44:00')),
            ],
        ]);
    }
}
