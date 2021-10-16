<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
	public function run()
	{
		$password = \password_hash("admin1234", \PASSWORD_DEFAULT);
		$data = [
			"name" => "sanjaya",
			"full_name" => "Mohammad Ricky Sanjaya",
			"email" => "me@ricky-sanjaya.my.id",
			"password" => $password,
			"user_status_id" => 1,
			"access_id" => 1,
			"created_at" => date("Y-m-d H:i:s")
		];

		$this->db->table("users")->insert($data);
	}
}
