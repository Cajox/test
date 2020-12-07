<?php

namespace App\Controllers\Auth;

use App\Controllers\Auth\Interfaces\LoginInterface;
use App\Controllers\Controller;
use App\Models\User;
use App\Validators\LoginValidator;

class LoginController extends Controller implements LoginInterface{

    public function index()
    {
        if (is_array($_SESSION['user']))
            header("Location:/");

        return $this->render('login');
    }

    public function login()
    {
        $data = $_POST;
        $validator = new LoginValidator($data);

        $formValidation = $validator->isValid();

        if(is_array($formValidation)){
            return $this->render('login', array('errors' => 'Bad request, pls try again!', 'oldInput' => $data));
        }

        $userModel = new User();

        $checkAuth = $userModel->findByEmailAndPassword($data['email'], $data['password']);
        if($checkAuth){
            $_SESSION['user'] = $checkAuth;
            header("Location: /");
            return $this->render('home');
        }

        return $this->render('login', array('errorMsg' => 'Error logging you in', 'oldInput' => $data));
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header("Location: /");
        return $this->render('home');
    }

}