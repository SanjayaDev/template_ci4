<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersStatus extends Seeder
{
	public function run()
	{
		$data = [
			[
				"user_status" => "Active"
			],
			[
				"user_status" => "Non Active"
			]
		];

		$this->db->table("users_status")->insertBatch($data);
	}
}
