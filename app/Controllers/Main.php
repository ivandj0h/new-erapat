<?php

namespace App\Controllers;

class Main extends BaseController
{
	public function index()
	{
		$data = ['page_title' => 'E-RAPAT - 2020'];
		return view('view_main', $data);
	}

	//--------------------------------------------------------------------

}
