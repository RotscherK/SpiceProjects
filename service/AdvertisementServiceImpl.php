<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 22.10.2018
 * Time: 22:09
 */

namespace service;

use domain\Advertisement;
use dao\AdvertisementDAO;
use http\HTTPException;
use http\HTTPStatusCode;

class AdvertisementServiceImpl implements AdvertisementService
{

    /**
     * @access public
     * @param advertisement Advertisement
     * @return Advertisement
     * @ParamType advertisement Advertisement
     * @ReturnType Advertisement
     * @throws HTTPException
     */
    public function createAdvertisement(Advertisement $advertisement) {
        if(AuthServiceImpl::getInstance()->verifyAuth()) {
            $advertisementDOA = new AdvertisementDAO();
            return $advertisementDOA->create($advertisement);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }
    /**
     * @access public
     * @param int couresId
     * @return $advertisement
     * @ParamType adbertisementId int
     * @ReturnType $advertisement
     * @throws HTTPException
     */
    public function readAdvertisement($advertisementId) {
        if(AuthServiceImpl::getInstance()->verifyAuth()) {
        $advertisementDAO = new AdvertisementDAO();
        return $advertisementDAO->read($advertisementId);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }


    /**
     * @access public
     * @param Advertisement advertisement
     * @return Advertisement
     * @ParamType advertisement Advertisement
     * @ReturnType Advertisement
     * @throws HTTPException
     */
    public function updateAdvertisement(Advertisement $advertisement) {
        if(AuthServiceImpl::getInstance()->verifyAuth()) {
            $advertisementDAO = new AdvertisementDAO();
            return $advertisementDAO->update($advertisement);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    /**
     * @access public
     * @param int advertisementId
     * @ParamType advertisementId int
     */
    public function deleteAdvertisement($advertisementId) {
        if(AuthServiceImpl::getInstance()->verifyAuth()) {
            $advertisementDAO = new AdvertisementDAO();
            $advertisement = new Advertisement();
            $advertisement->setId($advertisementId);
            $advertisementDAO->delete($advertisement);
            return;
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    /**
     * @access public
     * @return Advertisement[]
     * @ReturnType Advertisement[]
     */
    public function getAllAdvertisements() {
        $advertisementDAO = new AdvertisementDAO();
        return $advertisementDAO->getAllAdvertisements();
    }

    /**
     * @access public
     * @return int
     * @ReturnType rowCount
     */
    public function getAdvertisementsByUser($userId) {
        $advertisementDAO = new AdvertisementDAO();
        return $advertisementDAO->getAdvertisementsByUser($userId);
    }
}