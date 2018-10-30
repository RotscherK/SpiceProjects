<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 11.10.2017
 * Time: 11:21
 */

namespace validator;

use domain\User;

class UserValidator
{
    private $valid = true;
    private $emailError = null;
    private $passwordError = null;


    public function __construct(User $user = null)
    {
        if (!is_null($user)) {
            $this->validate($user);
        }
    }

    public function validate(User $user)
    {
        if (!is_null($user)) {
            if (empty($user->getEmail())) {
                $this->nameError = 'Please enter an email address';
                $this->valid = false;
            }

            if (empty($user->getPassword())) {
                $this->passwordError = 'Please select a password';
                $this->valid = false;
            }

        } else {
            $this->valid = false;
        }
        return $this->valid;

    }

    public function isValid()
    {
        return $this->valid;
    }

    public function isEmailError()
{
    return isset($this->emailError);
}

    public function getEmailError()
    {
        return $this->emailError;
    }

    public function isPasswordError()
    {
        return isset($this->passwordError);
    }

    public function getPasswordError()
    {
        return $this->passwordError;
    }

}