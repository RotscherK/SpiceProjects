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
            //$user->setAgentId(AuthServiceImpl::getInstance()->getCurrentAgentId());
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
     * @param Provider provider
     * @return Provider
     * @ParamType provider Provider
     * @ReturnType Provider
     * @throws HTTPException
     */
    public function updateProvider(Provider $provider) {
        if(AuthServiceImpl::getInstance()->verifyAuth()) {
            $providerDAO = new ProviderDAO();
            return $providerDAO->update($provider);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    /**
     * @access public
     * @param int providerId
     * @ParamType providerId int
     */
    public function deleteProvider($providerId) {
        if(AuthServiceImpl::getInstance()->verifyAuth()) {
            $providerDAO = new ProviderDAO();
            $provider = new Provider();
            $provider->setId($providerId);
            $providerDAO->delete($provider);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    /**
     * @access public
     * @return Provider[]
     * @ReturnType Provider[]
     * @throws HTTPException
     */
    public function getAllProviders() {
        $providerDAO = new ProviderDAO();
        return $providerDAO->getAllProviders();
    }

/**
 * @access public
 * @return Provider[]
 * @ReturnType Provider[]
 * @throws HTTPException
 */
public function getProviderAdmins() {
    return true;
}

}