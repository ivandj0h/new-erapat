<?php

namespace App\Controllers;

use App\Models\AccountModel;

class Account extends BaseController
{
    public function index()
    {
        $account = new AccountModel();
        $data = $account->getAccounts();
        return view('account', compact('data'));
    }
}
