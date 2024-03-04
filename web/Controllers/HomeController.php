<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class HomeController extends BaseController{

    public function index()
    {
        return $this->render('home');
    }
    public function errorpage()
    {
        return $this->render('404');
    }

}