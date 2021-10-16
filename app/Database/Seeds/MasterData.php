<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MasterData extends Seeder
{
	public function run()
	{
		$this->call("UsersStatus");
		$this->call("Divisions");
		$this->call("AccessLevels");
		$this->call("Users");
	}
}
