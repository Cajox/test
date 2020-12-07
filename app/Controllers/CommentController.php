<?php

namespace App\Controllers;

use App\Controllers\Interfaces\CommentInterface;
use App\Models\Comment;
use App\Validators\CreateCommentValidator;

class CommentController extends Controller implements CommentInterface{

    public function createComment()
    {
        $data = $_POST;

        $commentModel = new Comment();

        $validator = new CreateCommentValidator($data);
        $formValidation = $validator->isValid();

        if(is_array($formValidation)){

            header("Location: /?errorMsg=Wrong credentials");
            return $this->render('Home');
        }

        $commentModel->createComment($data);

        header('Location: /?success=Successful created comment');
        return $this->render('Home');

    }

    public function updateCommentActive()
    {
        $commentModel = new Comment();
        $commentModel->updateCommentActive($_POST['id'], $_POST['active']);

        header('Location: /admin/index');
    }


}