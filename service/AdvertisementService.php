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

    /**
     * @access public
     * @param advertisement Advertisement
     * @return Advertisement
     * @ParamType advertisement Advertisement
     * @ReturnType Advertisement
     */
    public function createAdvertisement(Advertisement $advertisement);

    /**
     * @access public
     * @param Advertisement advertisement
     * @return Advertisement
     * @ParamType advertisement Advertisement
     * @ReturnType Advertisement
     */
    public function updateAdvertisement(Advertisement $advertisement);

    /**
     * @access public
     * @param int advertisementId
     * @ParamType advertisementId int
     */
    public function deleteAdvertisement($advertisementId);

    /**
     * @access public
     * @return Advertisement[]
     * @ReturnType Advertisement[]
     */
    public function getAllAdvertisements();

    /**
     * @access public
     * @return int
     * @ReturnType rowCount
     */
    public function getAdvertisementsByUser($userId);

}

