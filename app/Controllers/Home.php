<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('Templates/header');
        echo view('home');
        echo view('Templates/footer');
    }
}
