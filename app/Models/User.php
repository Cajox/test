<?php

namespace App\Models;

class User extends Model{

    public function getAllUsers()
    {
        return self::$db->from('users')->execute();
    }

    public function findByEmailAndPassword($email, $password)
    {
        $password = md5($password);

        return self::$db->from('users')->where('email = ?', $email)->where('password = ?', $password)->fetch();
    }

    public function checkIfUserExist($email)
    {
        return self::$db->from('users')->where('email = ?', $email)->fetch();
    }

    public function register($data)
    {
        $values = [
            'email' =>  $data['email'],
            'password'  =>  md5($data['password']),
            'firstname'  =>  $data['firstname'],
            'lastname'  =>  $data['lastname'],
            'created_at'    =>  date("Y-m-d H:i:s", time())
        ];

        self::$db->insertInto('users', $values)->execute();

        return true;
    }

}