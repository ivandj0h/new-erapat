<?php

namespace App\Controllers;

class Main extends BaseController
{
	public function index()
	{
		$data = ['page_title' => 'E-RAPAT - Home'];
		return view('view_main', $data);
	}

	//--------------------------------------------------------------------

}
