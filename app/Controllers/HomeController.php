<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
//        if (!session()->get('logged_in')) {
//            return redirect()->to('/auth-user');
//        }
       return view('user/index');
    }
}
