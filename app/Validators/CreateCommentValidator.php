<?php
namespace App\Validators;

class CreateCommentValidator extends GeneralValidator {

    protected function validatorRules()
    {
        $this->validator->required('email')->email();
        $this->validator->required('name')->string();
        $this->validator->required('text')->string();
    }


}