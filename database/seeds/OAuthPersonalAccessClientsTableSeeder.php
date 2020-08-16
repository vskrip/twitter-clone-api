<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OAuthPersonalAccessClientsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('oauth_personal_access_clients')->insert([
      [
        'id' => '1',
        'client_id' => 1,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s")
      ]
    ]);
  }
}
