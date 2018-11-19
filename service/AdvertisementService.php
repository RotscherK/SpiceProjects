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
     * @param int providerId
     * @return Provider
     * @ParamType providerId int
     * @ReturnType Provider
     */
    public function readAdvertisement($advertisementId);

}