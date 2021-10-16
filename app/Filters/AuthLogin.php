<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Services\Auth;

class AuthLogin implements FilterInterface
{
	public function before(RequestInterface $request, $arguments = null)
	{
		$check_login = Auth::auth_login();

		if ($check_login->success) {
			return;
		}

		return \redirect()->to("/login")->with("message", "<script>sweet('Gagal!', '$check_login->message')</script>");
	}

	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		//
	}
}
