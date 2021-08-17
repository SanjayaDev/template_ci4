<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SessionsToken extends Migration
{
	public function up()
	{
		$this->forge->addField([
			"id" => [
				"type" => "int",
				"unsigned" => FALSE,
				"auto_increment" => TRUE
			],
			"user_id" => [
				"type" => "int"
			],
			"token" => [
				"type" => "varchar",
				"constraint" => 150
			],
			"created_at" => [
				"type" => "datetime"
			],
			"expired_at" => [
				"type" => "datetime"
			],
			"is_logout" => [
				"type" => "tinyint",
				"default" => 0
			],
		]);

		$this->forge->addPrimaryKey("id");
		$this->forge->addKey("user_id");
		$this->forge->createTable("session_tokens");
	}

	public function down()
	{
		$this->forge->dropTable("session_tokens");
	}
}
