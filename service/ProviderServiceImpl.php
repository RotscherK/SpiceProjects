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
     * @param int couresId
     * @return $provider
     * @ParamType providerId int
     * @ReturnType $provider
     * @throws HTTPException
     */
    public function readProvider($providerId) {
        $providerDAO = new providerDAO();
        return $providerDAO->read($providerId);
    }
}