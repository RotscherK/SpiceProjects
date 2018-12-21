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

class UserValidator
{
    private $valid = true;
    private $emailError = null;
    private $passwordError = null;
    private $passwordRepeatError = null;
    private $passwordCompareError = null;
    private $nameError = null;
    private $adminTypeError = null;

    public function __construct(User $user = null)
    {
        if (!is_null($user)){
            $this->validate($user);
        }
    }

    public function validate(User $user)
    {
        if (!is_null($user)) {
            if (empty($user->getFirstname())) {
                $this->nameError = 'Please enter the first name';
                $this->valid = false;
            }
            if (empty($user->getLastname())) {
                $this->nameError = 'Please enter the last name';
                $this->valid = false;
            }
            if (empty($user->getEmail())) {
                $this->emailError = 'Please enter an email address';
                $this->valid = false;
            }
            if (empty($user->getPassword())) {
                $this->passwordError = 'Please select a password. For security reasons a new password has to be set every time changes are made to a user';
                $this->valid = false;
            } else {
                if(strlen($user->getPassword()) < 7))){
                $this->passwordError = 'Please make sure your password contains at least 7 characters';
                $this->valid = false;
                }
            }
            if (empty($_POST["passwordRepeat"])){
                $this->passwordRepeatError = 'Please repeat the password';
                $this->valid = false;
            }                  
            if (empty($_POST["adminType"])){
                $this->adminTypeError = 'Please select a admin type';
                $this->valid = false;
            }
            if ($user->comparePasswords($_POST["password"],$_POST["passwordRepeat"]) == false){
                $this->passwordError = $_POST["password"].' & '.$_POST["passwordRepeat"];
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
    public function getPasswordRepeatError()
    {
        return $this->passwordRepeatError;
    }
    public function getPasswordCompareError()
    {
        return $this->passwordCompareError;
    }
    public function getAdminTypeError(){

        return $this->adminTypeError;
    }
    public function isAdminTypeError(){

        return isset($this->adminTypeError);
    }
}
