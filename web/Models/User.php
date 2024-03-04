<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\DeleteException;


class User extends BaseModel
{
    public static $STATUS_ACTIVED = 1;

    public static $STATUS_BANNED = 0;

    protected $table = "users";
    
    public function checkLogin($fields, $conditions, $limit = 1)
    {
        return $this->readData($this->table, $fields, $conditions, $limit);
    }

    public function checkRegister($fields)
    {
        return $this->createData($this->table, $fields);
    }

    public function viewUsers( $fields, $conditions, $limit)
    {
        return $this->readData($this->table, $fields, $conditions, $limit);
    }

    public function checkUserRegist($email)
    {
        $conditions = [
            "email" => $email,
        ];

        $user = new User();
        return $user->viewUsers(['email'],$conditions,1);
        
    }

    public function createUser($data){
        return $this->createData($this->table, $data);
    }

    public function hashPassword($password){
        return md5(sha1($password));
    }

    public function checkAccountAlready($fields, $conditions){
        return $this->getOne($this->table, $fields, $conditions);
    }
}