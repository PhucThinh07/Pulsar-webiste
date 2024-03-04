<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\User;

class UserController extends BaseController
{
    public function getUser()
    {
        $user = new User();
        $userList = $user->viewUsers(['id', 'fullname','email','role'],[],0);
        $data = $userList;
        $this->render('admin/adminUser', $data);
    }
}