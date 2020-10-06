<?php

namespace App\Controllers;

class Documentation extends BaseController
{
	public function index()
	{
		helper(['navbar', 'navbar_child']);
		$data = ['page_title' => 'E-RAPAT - Documentation', 'nav_title' => 'dokumentasi'];

		return view('view_documentation', $data);
	}
}
