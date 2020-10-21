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

	// Validasi untuk Pencarian Riwayat dari Data Rapat
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

	// Validasi untuk Pencarian Rapat Offline
	// Base Validaton
	public $rapat_offline = [
		'sub_type_id' => [
			'required' => ['rules' => 'required'],
		],
	];

	//  The Rules
	public $rapat_offline_errors = [
		'sub_type_id' => [
			'required' => 'SubTypeId tidak boleh kosong'
		],
	];

	// Validasi untuk Ganti Password
	// Base Validation
	public $ganti_password = [
		'password'     => 'required',
		'pass_confirm' => 'required|matches[password]',
	];

	public $ganti_password_errors = [
		'password' => [
			'required'    => 'Kata sandi tidak boleh kosong.',
		],
		'pass_confirm'    => [
			'required' => 'Kata sandi tidak sama.'
		]
	];

	public $cek_row_accounts = [
		'sub_department_name' => 'required|is_unique[view_user_department.sub_department_name]',
	];

	public $cek_row_accounts_errors = [
		'sub_department_name' => [
			'required'    => 'User ini sudah ada dalam database.',
		],
	];
}
