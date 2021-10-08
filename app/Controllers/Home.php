<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;

class Home extends BaseController
{
	public function index()
	{
		// dd(Time::now("Asia/Jakarta")->addMinutes(15)->format("Y-m-d H:i:s"));	
		return view('public_login');
	}
}
