<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AccessLevels extends Seeder
{
	public function run()
	{
		$data = [
			[
				"division_id" => 1,
				"level" => 100,
				"level_name" => "Super Admin"
			],
			[
				"division_id" => 2,
				"level" => 95,
				"level_name" => "Owner"
			]
		];

		$this->db->table("access_levels")->insertBatch($data);
	}
}
