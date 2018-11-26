<?php
/**
 * Created by PhpStorm.
 * User: timothyapplewhite
 * Date: 15.11.18
 * Time: 11:01
 */

namespace validator;

use domain\Provider;
use http\HTTPException;
use http\HTTPStatusCode;

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

            if (($provider->getAdministrator() == $_SESSION["userLogin"]["userID"])) {

                if (empty($provider->getName())) {
                    $this->nameError = 'Please enter the name';
                    $this->valid = false;
                }
                if (empty($provider->getDescription())) {
                    $this->nameError = 'Please enter the description';
                    $this->valid = false;
                }
                if (empty($provider->getPlz())) {
                    $this->emailError = 'Please enter a PLZ';
                    $this->valid = false;
                }
                if (empty($provider->getCity())) {
                    $this->passwordError = 'Please enter a city';
                    $this->valid = false;
                }
                if (empty($provider->getStreet())) {
                    $this->passwordError = 'Please enter a street';
                    $this->valid = false;
                }
                if (empty($provider->getBillingEmail())) {
                    $this->passwordError = 'Please enter a billing email';
                    $this->valid = false;
                }
                if (empty($provider->getAdministrator())) {
                    $this->passwordError = 'Please select an adminstrator';
                    $this->valid = false;
                }

            }else{
                throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
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