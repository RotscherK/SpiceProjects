<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 22.10.2018
 * Time: 21:48
 */

namespace domain;


class Provider extends AbstractJSONDTO {

    /**
     * @AttributeType int
     */
    protected $id;
    /**
     * @AttributeType String
     */
    protected $description;
    /**
     * @AttributeType int
     */
    protected $plz;
    /**
     * @AttributeType String
     */
    protected $city;
    /**
     * @AttributeType String
     */
    protected $street;
    /**
     * @AttributeType String
     */
    protected $billing_email;
    /**
     * @AttributeType Int
     */
    protected $administrator;

}
?>