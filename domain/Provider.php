<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 22.10.2018
 * Time: 21:48
 */

namespace domain;

use service\UserServiceImpl;

class Provider {

    /**
     * @AttributeType int
     */
    protected $id;

    /**
     *
     * @access protected
     * @var PROPTYPE
     */
    protected $name;

    /**
     * 
     *
     * @access protected
     * @var PROPTYPE
     */
    protected $description;

    /**
     * 
     *
     * @access protected
     * @var PROPTYPE
     */
    protected $plz;

    /**
     * 
     *
     * @access protected
     * @var PROPTYPE
     */
    protected $city;

    /**
     * 
     *
     * @access protected
     * @var PROPTYPE
     */
    protected $street;

    /**
     * 
     *
     * @access protected
     * @var PROPTYPE
     */
    protected $billing_email;

    /**
     * 
     *
     * @access protected
     * @var PROPTYPE
     */
    protected $administrator;

    /**
     *
     *
     * @access protected
     * @var PROPTYPE
     */
    protected $administratorEmail;

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $id ARGDESCRIPTION
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getName() {
        return $this->name;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $name ARGDESCRIPTION
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return String
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $description ARGDESCRIPTION
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return String
     */
    public function getPlz() {
        return $this->plz;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $plz ARGDESCRIPTION
     */
    public function setPlz($plz) {
        $this->plz = $plz;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return String
     */
    public function getCity() {
        return $this->city;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $city ARGDESCRIPTION
     */
    public function setCity($city) {
        $this->city = $city;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return String
     */
    public function getStreet() {
        return $this->street;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $street ARGDESCRIPTION
     */
    public function setStreet($street) {
        $this->street = $street;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getBillingEmail() {
        return $this->billing_email;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $billingEmail ARGDESCRIPTION
     */
    public function setBillingEmail($billingEmail) {
        $this->billing_email = $billingEmail;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getAdministrator() {
        return $this->administrator;
    }
    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $administrator ARGDESCRIPTION
     */
    public function setAdministrator($administrator) {
        $this->administrator = $administrator;
    }
    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getAdministratorEmail() {
        return (new UserServiceImpl())->readUserBasic($this->getAdministrator())->getEmail();
    }
}