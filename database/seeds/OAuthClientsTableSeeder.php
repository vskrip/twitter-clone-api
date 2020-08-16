<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OAuthClientsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('oauth_clients')->insert([
			[
				'id' => '1',
				'user_id' => '1',
				'name' => 'twitter-clone-api Personal Access Client',
				'secret' => 'NRuI1ABQ6nxlqrfWRX6SLhBBwjDI2WsYaRgHl6cR',
				'redirect' => 'http://127.0.0.1:8000',
				'personal_access_client' => 1,
				'password_client' => 0,
				'revoked' => 0,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			],
		]);
	}
}
