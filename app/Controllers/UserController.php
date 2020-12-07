<?php

namespace App\Controllers;

use App\Controllers\Interfaces\UserInterface;
use App\Models\Comment;

class UserController extends Controller implements UserInterface{

    public function adminIndex()
    {
        $commentModel = new Comment();
        $comments = $commentModel->getAllComments();

        return $this->render('admin.index', array('comments' => $comments));
    }


}