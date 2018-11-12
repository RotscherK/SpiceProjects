<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 22.10.2018
 * Time: 21:48
 */

namespace domain;


class User {

    /**
     * @AttributeType int
     */
    protected $id;
    /**
     * @AttributeType String
     */
    protected $lastname;
    /**
     * @AttributeType String
     */
    protected $firstname;
    /**
     * @AttributeType String
     */
    protected $email;
    /**
     * @AttributeType String
     */
    protected $password;
    /**
     * @AttributeType String
     */
    protected $passwordRepeat;
    /**
     * @AttributeType Boolean
     */
    protected $admin;
    /**
     * @AttributeType Boolean
     */
    protected $provider_admin;
    /**
     * @AttributeType Boolean
     */
    protected $ad_admin;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }


    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPasswordRepeat()
    {
        return $this->passwordRepeat;
    }
    /**
     * @return mixed
     */
    public function setPasswordRepeat($passwordRepeat)
    {
        $this->passwordReapeat = $passwordRepeat;
    }
    /**
     * @return mixed
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;
    }
    /**
     * @return mixed
     */
    public function getAdmin()
    {
        return $this->admin;
    }
    /**
     * @return mixed
     */
    public function setProviderAdmin($provider_admin)
    {
        $this->provider_admin = $provider_admin;
    }
    /**
     * @return mixed
     */
    public function getProviderAdmin()
    {
        return $this->provider_admin;
    }
    /**
     * @return mixed
     */
    public function setAdAdmin($ad_admin)
    {
        $this->ad_admin = $ad_admin;
    }
    /**
     * @return mixed
     */
    public function getAdAdmin()
    {
        return $this->ad_admin;
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
?>