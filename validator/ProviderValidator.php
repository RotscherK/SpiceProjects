<?php
/**
 * Created by PhpStorm.
 * User: timothyapplewhite
 * Date: 15.11.18
 * Time: 11:01
 */

namespace validator;

use domain\Provider;

class ProviderValidator
{
    private $valid = true;
    private $nameError = null;
    private $descriptionError = null;
    private $plzError = null;
    private $cityError = null;
    private $streetError = null;
    private $billingEmailError = null;
    private $administratorError = null;

    public function __construct(Provider $provider = null)
    {
        if (!is_null($provider)){
            $this->validate($provider);
        }
    }

    public function validate(Provider $provider)
    {
        if (!is_null($provider)) {
            if (empty($provider->getFirstname())) {
                $this->nameError = 'Please enter the first name';
                $this->valid = false;
            }
            if (empty($provider->getLastname())) {
                $this->nameError = 'Please enter the last name';
                $this->valid = false;
            }
            if (empty($provider->getEmail())) {
                $this->emailError = 'Please enter an email address';
                $this->valid = false;
            }
            if (empty($provider->getPassword())) {
                $this->passwordError = 'Please select a password';
                $this->valid = false;
            }
            if (empty($_POST["passwordRepeat"])){
                $this->passwordRepeatError = 'Please repeat the password';
                $this->valid = false;
            }
            if (empty($_POST["adminType"])){
                $this->adminTypeError = 'Please select a admin type';
                $this->valid = false;
            }
            if ($provider->comparePasswords($_POST["password"],$_POST["passwordRepeat"]) == false){
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
    public function isDescriptionError()
    {
        return isset($this->descriptionError);
    }

    public function getDescriptionError()
    {
        return $this->descriptionError;
    }

    public function isPlzError()
    {
        return isset($this->plzError);
    }

    public function getPlzError()
    {
        return $this->plzError;
    }
    public function isCityError()
    {
        return isset($this->cityError);
    }
    public function getCityError()
    {
        return $this->cityError;
    }
    public function isStreetError()
    {
        return isset($this->streetError);
    }
    public function getStreetError()
    {
        return $this->streetError;
    }
    public function isBillingEmailError()
    {
        return isset($this->billingEmailError);
    }
    public function getBillingEmailError()
    {
        return $this->billingEmailError;
    }
    public function isAdministratorError()
    {
        return isset($this->administratorError);
    }
    public function getAdministratorError()
    {
        return $this->administratorError;
    }

}