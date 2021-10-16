<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	public $login = [
		"name" => [
			"rules" => "required|alpha_numeric_space",
			"label" => "Username",
			"errors" => [
				"required" => "Username wajib di isi!",
				"alpha_numeric_space" => "Username tidak boleh mengandung karakter khusus!"
			]
		],
		"password" => [
			"rules" => "required|min_length[8]|alpha_numeric_space",
			"label" => "Password",
			"errors" => [
				"required" => "Password wajib di isi!",
				"min_length" => "Password minimal 8 karakter!",
				"alpha_numeric_space" => "Password tidak boleh mengandung karakter khusus!"
			]
		]
	];
}
