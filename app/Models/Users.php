<?php

namespace App\Models;

use App\Services\Response;
use CodeIgniter\Model;
use App\Services\Addon;
use App\Entities\Authentication;
use App\Models\Authentication_model;
use stdClass;

class Users extends Model
{
	protected $table                = 'users u';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $returnType           = 'object';
	protected $protectFields        = true;
	protected $allowedFields        = ["name", "full_name", "email", "password", "phone", "user_status_id", "access_id", "last_login"];

	// Dates
	protected $useTimestamps        = TRUE;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';

	public function check_login($username, $password)
	{
		$response = new Response();
		$response->url = "/login";
		$check_user = $this->select("u.*, al.*, al.`id` AS `access_id`")
			->join("access_levels al", "al.`id` = u.access_id")
			->where("name", $username);

		$user = $check_user->first();
		if ($user) {
			if (\password_verify($password, $user->password)) {
				if ($user->user_status_id == 1) {
					$authentication_model = new Authentication_model();
					$index_loop = 1;
					$error_loop = FALSE;

					do {
						$token = Addon::generate_random_string(15);
						$count_exists_token = $authentication_model->where("token", $token)->countAllResult();
						$index_loop++;

						if ($index_loop > 10) {
							$error_loop = TRUE;
							break;
						}
					} while ($count_exists_token > 0);

					if ($error_loop === FALSE) {
						$session_data = [
							"user_id" => $user->id,
							"token" => $token,
							"created_at" => date("Y-m-d H:i:s"),
							"expired_at" => date("Y-m-d H:i:s", \strtotime("+15minute")),
							"is_logout" => 0
						];

						$authentication_model->save($session_data);

						$session_data = [
							"user_id" => $user->id,
							"division_id" => $user->division_id,
							"access_id" => $user->access_id,
							"level" => $user->level,
							"session_token" => $token
						];
						session()->set($session_data);
						$response->success = TRUE;
						$response->url = "/dashboard";
					} else {
						$response->message = "Gagal generate session token!";
					}
				} else {
					$response->message = "Akun anda tidak aktif! Silahkan hubungi administrator!";
				}
			} else {
				$response->message = "Password yang anda masukan salah!";
			}
		} else {
			$response->message = "Akun tidak ditemukan!";
		}

		return $response;
	}
}
