<?php

namespace App\Controllers;

class Documentation extends BaseController
{
	public function index()
	{
		helper(['navbar']);
		$data = ['page_title' => 'E-RAPAT - Documentation'];

		return view('view_documentation', $data);
	}
}
