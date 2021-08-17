<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AccessLevel extends Migration
{
	public function up()
	{
		$this->forge->addField([
			"id" => [
				"type" => "int",
				"unsigned" => FALSE,
				"auto_increment" => TRUE
			],
			"division_id" => [
				"type" => "int"
			],
			"level" => [
				"type" => "int"
			],
			"level_name" => [
				"type" => "varchar",
				"constraint" => 100
			]
		]);

		$this->forge->addPrimaryKey("id");
		$this->forge->addKey("division_id");
		$this->forge->addForeignKey("division_id", "divisions", "id", "CASCADE", "RESTRICT");
		$this->forge->createTable("access_levels");
	}

	public function down()
	{
		$this->forge->dropForeignKey("access_levels", "access_levels_division_id_foreign");
		$this->forge->dropTable("access_levels");
	}
}
