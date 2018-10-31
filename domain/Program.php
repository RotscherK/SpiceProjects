<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 22.10.2018
 * Time: 21:48
 */

namespace domain;


class Program {

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
    protected $category_id;
    /**
     * @AttributeType boolean
     */
    protected $distance_learning;
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
    protected $requirements;
    /**
     * @AttributeType String
     */
    protected $url;
    /**
     * @AttributeType Date
     */
    protected $start_date;

    /**
     * @AttributeType Int
     */
    protected $provider_id;

    /**
     * @AttributeType Boolean
     */
    protected $is_billed;

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
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    /**
     * @return mixed
     */
    public function getDistanceLearning()
    {
        return $this->distance_learning;
    }

    /**
     * @param mixed $distance_learning
     */
    public function setDistanceLearning($distance_learning)
    {
        $this->distance_learning = $distance_learning;
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
        return $this->requirements;
    }

    /**
     * @param mixed $requirement
     */
    public function setRequirement($requirements)
    {
        $this->requirements = $requirements;
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
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * @param mixed $start_date
     */
    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;
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
    /**
     * @return mixed
     */
    public function getisBilled()
    {
        return $this->is_billed;
    }

    /**
     * @param mixed $is_billed
     */
    public function setisBilled($is_billed)
    {
        $this->is_billed = $is_billed;
    }

}
