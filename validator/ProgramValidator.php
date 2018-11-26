<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 11.10.2017
 * Time: 11:21
 */

namespace validator;

use domain\Program;
use http\HTTPException;
use http\HTTPStatusCode;

class ProgramValidator
{
    private $valid = true;
    private $nameError = null;
    private $typeError = null;
    private $categoryIDError = null;
    private $degreeError = null;
    private $priceError = null;
    private $durationError = null;
    private $descriptionError = null;
    private $requirementsError = null;
    private $urlError = null;
    private $startDateError = null;
    private $providerIDError = null;

    public function __construct(Program $program = null)
    {
        if (!is_null($program)) {
            $this->validate($program);
        }
    }

    public function validate(Program $program)
    {
        if (!is_null($program)) {

            if (($program->getProvider()->getAdministrator() == $_SESSION["userLogin"]["userID"])) {

                if (empty($program->getName())) {
                    $this->nameError = 'Please enter a name';
                    $this->valid = false;
                }

                if (empty($program->getType())) {
                    $this->typeError = 'Please select a type';
                    $this->valid = false;
                }

                if (empty($program->getCategoryId())) {
                    $this->categoryIDError = 'Please select a category';
                    $this->valid = false;
                }

                if (empty($program->getDegree())) {
                    $this->degreeError = 'Please enter a degree';
                    $this->valid = false;
                }

                if (empty($program->getPrice())) {
                    $this->priceError = 'Please enter a price';
                    $this->valid = false;
                } else if ($program->getPrice() < 0) {
                    $this->priceError = 'Please enter a valid price';
                    $this->valid = false;
                }

                if (empty($program->getDuration())) {
                    $this->durationError = 'Please select a duration';
                    $this->valid = false;
                }

                if (empty($program->getDescription())) {
                    $this->descriptionError = 'Please enter a description';
                    $this->valid = false;
                }

                if (empty($program->getRequirement())) {
                    $this->requirementsError = 'Please enter requirements';
                    $this->valid = false;
                }

                if (empty($program->getUrl())) {
                    $this->urlError = 'Please enter an url';
                    $this->valid = false;
                }

                if (empty($program->getStartDate())) {
                    $this->expirationError = 'Please enter a start date';
                    $this->valid = false;
                } else if (strtotime($program->getStartDate()) === strtotime('today')) {
                    $this->expirationError = 'Please enter a valid start date';
                    $this->valid = false;
                }


                if (empty($program->getProviderId())) {
                    $this->providerIDError = 'Please select a provider';
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

    public function isTypeError()
    {
        return isset($this->typeError);
    }

    public function getTypeError()
    {
        return $this->typeError;
    }

    public function isCategoryIDError()
    {
        return isset($this->categoryIDError);
    }

    public function getCategoryIDError()
    {
        return $this->categoryIDError;
    }

    public function isDegreeError()
    {
        return isset($this->degreeError);
    }

    public function getDegreeError()
    {
        return $this->degreeError;
    }

    public function isPriceError()
    {
        return isset($this->priceError);
    }

    public function getPriceError()
    {
        return $this->priceError;
    }

    public function isDurationError()
    {
        return isset($this->durationError);
    }

    public function getDurationError()
    {
        return $this->durationError;
    }

    public function isDescriptionError()
    {
        return isset($this->descriptionError);
    }

    public function getDescriptionError()
    {
        return $this->descriptionError;
    }

    public function isRequirementError()
    {
        return isset($this->requirementsError);
    }

    public function getRequirementError()
    {
        return $this->requirementsError;
    }

    public function isURLError()
    {
        return isset($this->urlError);
    }

    public function getURLError()
    {
        return $this->urlError;
    }

    public function isStartDateError()
    {
        return isset($this->startDateError);
    }

    public function getStartDateError()
    {
        return $this->startDateError;
    }


    public function isProviderIDError()
    {
        return isset($this->providerIDError);
    }

    public function getProviderIDError()
    {
        return $this->providerIDError;
    }

}