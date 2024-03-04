<?php

namespace App\Interfaces;

use App\Models\User;

trait LoginTrait
{
    public function login($email, $password)
    {
        $user = new User();

        $field = ['id', 'email', 'password', 'fullname', 'status','role'];
        $condition = ["email" => $email, "password" => $password];

        $result = $user->checkLogin($field, $condition, 1);
        return $result;
    }
    
    public function register($email, $password, $fullname)
    {
        // Xử lý đăng ký tại đây
        $user = new User();
        $table = "users";
        $data = [
            "fullname" => $fullname,
            "email"    => $email,
            "password" => $password
        ];
        return $user->createData($table, $data);
    }

    public function checkEmailAlready($email){
        $fields =['*'];
        $conditions = [
          "email" => $email  
        ];
        return $this->_user->checkAccountAlready($fields,$conditions);
    }

    public function logout($request)
    {
        // Xử lý đăng xuất tại đây
    }

    public function isLoggedIn()
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
    }
}
