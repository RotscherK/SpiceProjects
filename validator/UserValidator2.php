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

class UserValidator2
{
    private $valid = true;
    private $emailError = null;
    private $passwordError = null;
    private $nameError = null;

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
                $this->nameError = 'Please enter an email address';
                $this->valid = false;
            }
            if (empty($user->getPassword())) {
                $this->passwordError = 'Please select a password';
                $this->valid = false;
            }
            if (empty($user->getPasswordRepeat())) {
                $this->passwordError = 'Please repeat the password';
                $this->valid = false;
            }
            if(!comparePasswords($_POST["password"],$_POST["passwordRepeat"])){
                $this->passwordError = 'Passwords do not match!';
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
    public function comparePasswords($password, $passwordRepeat){
        if($password == $passwordRepeat){
            return true;
        }
        else{
            return false;
        }
    }
}