<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 22.10.2018
 * Time: 21:48
 */

namespace domain;

use dao\AdvertisementDAO;
use service\UserServiceImpl;

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
    protected $administrator;
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
     * @param mixed $title
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
     * @param mixed $content
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
     * @param mixed $url
     */
    public function setURL($url)
    {
        $this->url = $url;
    }

    /**
     * @param $user_admin
     * @return mixed
     */
    public function setUserAdmin($administrator)
    {
        $this->administrator = $administrator;
    }
    /**
     * @return mixed
     */
    public function getUserAdmin()
    {
        return $this->administrator;
    }

    public function getAdministratorEmail() {
        return (new UserServiceImpl())->readUserBasic($this->getUserAdmin())->getEmail();
        //return (new AdvertisementDAO())->getAdministratorEmail($this->administrator);
    }

}
?>