<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    # Compare dates:
    # http://php.net/manual/pt_BR/datetime.diff.php


}
