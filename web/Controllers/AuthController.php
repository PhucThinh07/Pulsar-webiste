<?php


namespace App\Controllers;

use App\Interfaces\LoginTrait;
use App\Controllers\BaseController;
use App\Models\User;
use App\Core\ValidateInput;

class AuthController extends BaseController
{
    use LoginTrait;
    private $_validate;
    private $_user;

    public function __construct()
    {
        $this->_user = new User();
        $this->_validate = new ValidateInput();
    }

    public function getLogin()
    {
        $data = [];
        $this->render('login', $data);
    }

    public function postLogin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!$this->_validate->isEmpty($email) && !$this->_validate->isEmpty($password)) {
            $login = $this->login($email, $this->_user->hashPassword($password));
            $checkLogin = $this->login($email, $password);
            if (!empty($login)) {
                $_SESSION['checkLogin'] = true;
                $message = "Đăng nhập thành công rồi nè";
                $_SESSION['user'] = $login;
                $data = [
                    "email" => $email,
                    "password" => $password,
                    "message" => $message,
                ];
                return $this->render('home', $data);
            } else {
                $message = "Email hoặc mật khẩu không chính xác !";
            }
        } else {
            $message = " Vui lòng nhập email và mật khẩu ! ";
        }
        $data = [
            "email" => $email,
            "password" => $password,
            "message" => $message
        ];
        return $this->render('login', $data);
    }

    public function getLogout()
    {
        $_SESSION['checkLogin'] = false;
        unset($_SESSION['user']);
        header('Location: /');
    }

    public function getRegister()
    {
        $data = [];
        $this->render('register', $data);
    }

    public function postRegister()
    {
        $email    = $_POST['email'] ?? '';
        $fullname = $_POST['fullname'] ?? '';
        $password = $_POST['password'] ?? '';

        if (!$this->_validate->isEmpty($fullname) && !$this->_validate->isEmpty($email) && !$this->_validate->isEmpty($password)) {
            if ($this->_validate->isValidEmail($email)) {
                if (!$this->checkEmailAlready($email)) {
                    if ($this->_validate->isValidPassword($password)) {
                        $values = [
                            'fullname' => $fullname,
                            'password' => $this->_user->hashPassword($password),
                            'email' => $email,
                            'status' => User::$STATUS_ACTIVED,
                            'role' => User::$STATUS_BANNED,
                        ];
                        $response = $this->_user->createUser($values);
                        if (!empty($response)) {
                            $data = [
                                "email" => $email,
                                "password" => $password,
                                "message" => "Đăng ký thành công !"
                            ];
                            return $this->render('login', $data);
                        } else {
                            $message = "Đăng ký không thành công";
                        }
                    } else {
                        $message = "Mật khẩu bao gồm 01 ký tự in hoa, độ dài lớn hơn 08 !";
                    }
                } else {
                    $message = "Email đã được sử dụng !";
                }
            } else {
                $message = "Email không đúng định dạng !";
            }
        } else {
            $message = "Vui lòng nhập đầy đủ thông tin !";
        };

        $data = [
            'fullname' => $fullname,
            'email' => $email,
            'password' => $password,
            'message' => $message,
        ];
        return $this->render('register', $data);
    }
}
