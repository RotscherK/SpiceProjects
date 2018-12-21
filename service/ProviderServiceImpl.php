<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 22.10.2018
 * Time: 22:09
 */

namespace service;

use domain\Provider;
use dao\ProviderDAO;
use http\HTTPException;
use http\HTTPStatusCode;

class ProviderServiceImpl implements ProviderService
{

    /**
     * @access public
     * @param Provider provider
     * @return Provider
     * @ParamType provider Provider
     * @ReturnType Provider
     * @throws HTTPException
     */
    public function createProvider(Provider $provider) {
        if(AuthServiceImpl::getInstance()->verifyAuth()) {
            $providerDAO = new ProviderDAO();
            return $providerDAO->create($provider);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }
    /**
     * @access public
     * @param int couresId
     * @return $provider
     * @ParamType providerId int
     * @ReturnType $provider
     * @throws HTTPException
     */
    public function readProvider($providerId) {
        if(AuthServiceImpl::getInstance()->verifyAuth()) {
        $providerDAO = new providerDAO();
        return $providerDAO->read($providerId);
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
            return;
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    /**
     * @access public
     * @return Provider[]
     * @ReturnType Provider[]
     */
    public function getAllProviders() {
        $providerDAO = new ProviderDAO();
        return $providerDAO->getAllProviders();
    }
    /**
     * @access public
     * @return int
     * @ReturnType rowCount
     */
    public function getProvidersByUser($userId){
        $providerDAO = new ProviderDAO();
        return $providerDAO->getProvidersByUser($userId);
    }

    }