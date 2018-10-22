<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 11.10.2017
 * Time: 11:21
 */

namespace validator;

use domain\Course;

class CourseValidator
{
    private $valid = true;
    private $nameError = null;
    private $descriptionError = null;
    private $priceError = null;
    private $expirationdateError = null;
    private $requirementsError = null;
    private $universityIDError = null;

    public function __course(Course $course = null)
    {
        if (!is_null($course)) {
            $this->validate($course);
        }
    }

    public function validate(Course $course)
    {
        if (!is_null($course)) {
            if (empty($course->getName())) {
                $this->nameError = 'Please enter a name';
                $this->valid = false;
            }

            if (empty($course->getDescription())) {
                $this->descriptionError = 'Please enter a description';
                $this->valid = false;
            }

            if (empty($course->getPrice())) {
                $this->priceError = 'Please enter a price';
                $this->valid = false;
            }else if($course->getPrice()<0){
                $this->priceError = 'Please enter a valid price';
                $this->valid = false;
            }

            if (empty($course->getExpirationDate())) {
                $this->expirationdateError = 'Please enter an expiration date';
                $this->valid = false;
            }else if(strtotime($course->getExpirationDate()) === strtotime('today')){
                $this->expirationdateError = 'Please enter a valid price';
                $this->valid = false;
            }

            if (empty($course->getRequirement())) {
                $this->requirementsError = 'Please enter requirements';
                $this->valid = false;
            }

            if (empty($course->getUniversityId())) {
                $this->universityIDError = 'Please select an university';
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

    public function isPriceError()
    {
        return isset($this->priceError);
    }

    public function getPriceError()
    {
        return $this->priceError;
    }

    public function isExpirationDateError()
    {
        return isset($this->expirationdateError);
    }

    public function getxpirationDateError()
    {
        return $this->expirationdateError;
    }

    public function isReqirementError()
    {
        return isset($this->requirementsError);
    }

    public function getReqirementError()
    {
        return $this->requirementsError;
    }

    public function isUniversityIDError()
    {
        return isset($this->universityIDError);
    }

    public function getUniversityIDError()
    {
        return $this->universityIDError;
    }

}