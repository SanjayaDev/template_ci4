<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
			"id" => [
				"type" => "int",
				"unsigned" => FALSE,
				"auto_increment" => TRUE,
			],
			"name" => [
				"type" => "varchar",
				"constraint" => 255
			],
			"full_name" => [
				"type" => "varchar",
				"constraint" => 255
			],
			"email" => [
				"type" => "varchar",
				"constraint" => 255
			],
			"password" => [
				"type" => "varchar",
				"constraint" => 255
			],
			"phone" => [
				"type" => "varchar",
				"constraint" => 30,
				"null" => TRUE
			],
			"user_status_id" => [
				"type" => "int",
			],
			"access_id" => [
				"type" => "int",
			],
			"last_login" => [
				"type" => "datetime",
				"null" => TRUE
			],
			"created_at" => [
				"type" => "datetime"
			],
			"updated_at" => [
				"type" => "datetime",
				"null" => TRUE
			],
		]);

		$this->forge->addPrimaryKey("id");
		$this->forge->addForeignKey("user_status_id", "users_status", "id", "CASCADE", "RESTRICT");
		$this->forge->addForeignKey("access_id", "access_levels", "id", "CASCADE", "RESTRICT");
		$this->forge->addUniqueKey("email");
		$this->forge->createTable("users");
	}

	public function down()
	{
		$this->forge->dropForeignKey("users", "users_user_status_id_foreign");
		$this->forge->dropForeignKey("users", "users_access_id_foreign");
		$this->forge->dropTable("users");
	}
}
