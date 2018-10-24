<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 22.10.2018
 * Time: 21:48
 */

namespace domain;


class Program extends AbstractJSONDTO {

    /**
     * @AttributeType int
     */
    protected $id;
    /**
     * @AttributeType String
     */
    protected $name;
    /**
     * @AttributeType Int
     */
    protected $type;
    /**
     * @AttributeType Int
     */
    protected $categoryid;
    /**
     * @AttributeType boolean
     */
    protected $distancelearning;
    /**
     * @AttributeType String
     */
    protected $degree;
    /**
     * @AttributeType Double
     */
    protected $price;
    /**
     * @AttributeType String
     */
    protected $duration;
    /**
     * @AttributeType String
     */
    protected $description;
    /**
     * @AttributeType String
     */
    protected $requirement;
    /**
     * @AttributeType String
     */
    protected $url;
    /**
     * @AttributeType Date
     */
    protected $expiration;

    /**
     * @AttributeType Int
     */
    protected $provider_id;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->categoryid;
    }

    /**
     * @param mixed $categoryid
     */
    public function setCategoryId($categoryid)
    {
        $this->categoryid = $categoryid;
    }

    /**
     * @return mixed
     */
    public function getDistanceLearning()
    {
        return $this->distancelearning;
    }

    /**
     * @param mixed $distancelearning
     */
    public function setDistanceLearning($distancelearning)
    {
        $this->distancelearning = $distancelearning;
    }

    /**
     * @return mixed
     */
    public function getDegree()
    {
        return $this->degree;
    }

    /**
     * @param mixed $degree
     */
    public function setDegree($degree)
    {
        $this->degree = $degree;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param mixed $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getRequirement()
    {
        return $this->requirement;
    }

    /**
     * @param mixed $requirement
     */
    public function setRequirement($requirement)
    {
        $this->requirement = $requirement;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getExpiration()
    {
        return $this->expiration;
    }

    /**
     * @param mixed $expiration
     */
    public function setExpiration($expiration)
    {
        $this->expiration = $expiration;
    }

    /**
     * @return mixed
     */
    public function getProviderId()
    {
        return $this->provider_id;
    }

    /**
     * @param mixed $provider_id
     */
    public function setProviderId($provider_id)
    {
        $this->provider_id = $provider_id;
    }

}
?>