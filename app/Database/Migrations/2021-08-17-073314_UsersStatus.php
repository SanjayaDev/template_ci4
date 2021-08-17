<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsersStatus extends Migration
{
	public function up()
	{
		$this->forge->addField([
			"id" => [
				"type" => "int",
				"unsigned" => FALSE,
				"auto_increment" => TRUE
			],
			"user_status" => [
				"type" => "varchar",
				"constraint" => 50
			]
		]);

		$this->forge->addPrimaryKey("id");
		$this->forge->createTable("users_status");
	}

	public function down()
	{
		$this->forge->dropTable("users_status");
	}
}
