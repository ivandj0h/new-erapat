<?php

namespace App\Controllers;

class Main extends BaseController
{
	public function index()
	{
		helper(['navbar']);
		$data = ['page_title' => 'E-RAPAT - Home', 'nav_title' => 'calendar'];

		return view('view_main', $data);
	}
}
