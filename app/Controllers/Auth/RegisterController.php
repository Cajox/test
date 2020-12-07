<?php

namespace App\Controllers\Auth;

use App\Controllers\Auth\Interfaces\RegisterInterface;
use App\Controllers\Controller;
use App\Models\User;
use App\Validators\RegisterValidator;

class RegisterController extends Controller implements RegisterInterface{

    public function index()
    {
        if (is_array($_SESSION['user']))
            header("Location:/");

        return $this->render('register');
    }

    public function register()
    {
        $data = $_POST;
        $validator = new RegisterValidator($data);

        $formValidation = $validator->isValid();

        if(is_array($formValidation)){
            return $this->render('register', array('errors' => 'Bad request, pls try again!', 'oldInput' => $data));
        }

        $userModel = new User();
        $checkUserExist = $userModel->checkIfUserExist($data['email']);

        if($checkUserExist){
            return $this->render('register', array('errorMsg' => 'User exist. Please login or choose different email'));
        }

        $userModel->register($data);

        return $this->render('register', array('success' => 'Successful registration. Please login.'));
    }
}