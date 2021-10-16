<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;

class Authentication extends BaseController
{
	public function view_login()
	{
		session()->remove(["is_login", "id", "session_token", "division_id", "access_id"]);
		$data["validation"] = session("validation") ? \session("validation") : \Config\Services::validation();
		return view("public_login", $data);
	}

	public function validate_login()
	{
		$validation = \Config\Services::validation();
		$validation->setRuleGroup("login");

		if (!$validation->withRequest($this->request)->run()) {
			session()->setFlashdata("message", "<script>alert('Gagal login! Input yang anda kirim tidak valid!')</script>");
			return \redirect()->back()->with("validation", $validation);
		} else {
			$users = new Users();
			$username = $this->request->getPost("name");
			$password = $this->request->getPost("password");

			$check_user = $users->check_login($username, $password);
			if ($check_user->success) {
				return \redirect()->to($check_user->url);
			} else {
				session()->setFlashdata("message", "<script>alert('$check_user->message')</script>");
				return \redirect()->back();
			}
		}
	}
}
