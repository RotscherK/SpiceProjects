<?php
/**
 * Created by PhpStorm.
 * Provider: roger.kaufmann
 * Date: 25.10.2018
 * Time: 10:08
 */

namespace service;

use domain\Advertisement;

/**
 * @access public
 * @author Nicola.Niklajs
 */
interface AdvertisementService {

    /**
     * @access public
     * @param int advertisementId
     * @return Advertisement
     * @ParamType advertisementId int
     * @ReturnType Advertisement
     */
    public function readAdvertisement($advertisementId);

}