<?php

namespace App\Controllers;


use App\Controllers\BaseController;

class SiteController extends BaseController
{
    

    public function getIntroduce()
    {
        $data = [];
        $this->render('intro', $data);
    }
    public function getHelp()
    {
        $data = [];
        $this->render('help', $data);
    }
}