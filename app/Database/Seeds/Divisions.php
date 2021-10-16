<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Divisions extends Seeder
{
	public function run()
	{
		$data = [
			[
				"division" => "System Administrator"
			],
			[
				"division" => "Internal"
			]
		];

		$this->db->table("divisions")->insertBatch($data);
	}
}
