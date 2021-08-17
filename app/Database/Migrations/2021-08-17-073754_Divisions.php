<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Divisions extends Migration
{
	public function up()
	{
		$this->forge->addField([
			"id" => [
				"type" => "int",
				"unsigned" => FALSE,
				"auto_increment" => TRUE
			],
			"division" => [
				"type" => "varchar",
				"constraint" => 50
			]
		]);

		$this->forge->addPrimaryKey("id");
		$this->forge->createTable("divisions");
	}

	public function down()
	{
		$this->forge->dropTable("divisions");
	}
}
