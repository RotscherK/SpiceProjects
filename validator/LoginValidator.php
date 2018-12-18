<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 11.10.2017
 * Time: 11:21
 */

namespace validator;

use domain\User;
use service\AuthServiceImpl;

class LoginValidator
{
    private $valid = true;
    private $emailError = null;
    private $passwordError = null;


    public function __construct(User $user = null, AuthServiceImpl $authService = null)
    {
        if (!is_null($user)& !is_null($authService)) {
            $this->validate($user, $authService);
        }
    }

    public function validate(User $user, AuthServiceImpl $authService)
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

            if(!$authService->verifyUser($_POST["email"],$_POST["password"])){
                $this->passwordError = 'Email and password do not match!';
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

    public function isNameError()
    {
        return isset($this->nameError);
    }

    public function getNameError()
    {
        return $this->nameError;
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