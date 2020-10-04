<?php

namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	public $register = [
		'username' => [
			'rules' => 'required|min_length[5]',
		],
		'password' => [
			'rules' => 'required',
		],
		'email'        => [
			'rules' => 'required|valid_email',
		],
		'repeatPassword' => [
			'rules' => 'required|matches[password]',
		],
	];

	public $register_errors = [
		'username' => [
			'required' => '{field} Harus Diisi',
			'min_length' => '{field} Minimal 5 Karakter',
		],
		'email'    => [
			'valid_email' => 'Email tidak Valid.'
		],
		'password' => [
			'required' => '{field} Harus Diisi',
		],
		'repeatPassword' => [
			'required' => '{field} Harus Diisi',
			'matches' => '{field} Tidak Match Dengan Password'
		],
	];

	public $login = [
		'email' => [
			'rules' => 'required|valid_email',
		],
		'password' => [
			'rules' => 'required',
		],
	];

	public $login_errors = [
		'email' => [
			'required' => '{field} Harus Diisi',
			'valid_email' => '{field} tidak Valid',
		],
		'password' => [
			'required' => '{field} Harus Diisi',
		],
	];

	// Validasi untuk Pencarian Riwayat dar Data Rapat
	// Base Validaton
	public $riwayat = [
		'from_date' => ['rules' => 'required'],
		'to_date' => ['rules' => 'required'],
	];

	// The Rules
	public $riwayat_errors = [
		'from_date' => [
			'required' => 'Tanggal Awal Harus diisi'
		],
		'to_date' => [
			'required' => 'Tanggal Akhir Harus diisi'
		]
	];
}
