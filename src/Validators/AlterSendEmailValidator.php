<?php

namespace LaravelAlterSendEmailValidator\Validators;

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\EmailValidation;
use Illuminate\Support\Facades\Validator;

class AlterSendEmailValidator extends EmailValidator
{
    /**
     * Alter email validation when sending email
     *
     * @param  string                                         $email
     * @param  EguliasEmailValidatorValidationEmailValidation $emailValidation
     * @return boolean
     */
    public function isValid($email, EmailValidation $emailValidation)
    {
        $rules = \Config::get('alter-email-validation.rules');

        if (is_null($rules)) {
            $rules = [
                'regex:/^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/ui'
            ];
        }

        $validator = Validator::make(
            [
                'email' => $email
            ],
            [
                'email' => $rules
            ]
        );

        if ($validator->fails()) {
            return false;
        }

        return true;
    }
}
