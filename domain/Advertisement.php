<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 22.10.2018
 * Time: 21:48
 */

namespace domain;


class Advertisement {

    /**
     * @AttributeType int
     */
    protected $id;
    /**
     * @AttributeType String
     */
    protected $title;
    /**
     * @AttributeType String
     */
    protected $content;
    /**
     * @AttributeType String
     */
    protected $url;
    /**
     * @AttributeType String
     */
    protected $user_admin;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $lastname
     */
    public function setTitle($title)
    {
        $this->titile = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $firstname
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getURL()
    {
        return $this->url;
    }

    /**
     * @param mixed $email
     */
    public function setURL($url)
    {
        $this->url = $url;
    }

    /**
     * @param $user_admin
     * @return mixed
     */
    public function setUserAdmin($user_admin)
    {
        $this->user_admin = $user_admin;
    }
    /**
     * @return mixed
     */
    public function getUserAdmin()
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
}
?>