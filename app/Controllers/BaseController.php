<?php

namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();

		//--------------------------------------------------------------------
		// The Model Collections
		//--------------------------------------------------------------------

		$this->validation = \Config\Services::validation();
		$this->conn = \Config\Database::connect();
		$this->auths = new \App\Models\AuthModel();
		$this->user = new \App\Models\UserModel();
		$this->account = new \App\Models\AccountModel();
		$this->department = new \App\Models\DepartmentModel();
		$this->roles = new \App\Models\RoleModel();
		$this->rapats = new \App\Models\RapatModel();
		$this->department = new \App\Models\DepartmentModel();
		$this->subdepartment = new \App\Models\SubDepartmentModel();

		//--------------------------------------------------------------------
	}
}
