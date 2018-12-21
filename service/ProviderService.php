<?php
/**
 * Created by PhpStorm.
 * Provider: roger.kaufmann
 * Date: 25.10.2018
 * Time: 10:08
 */

namespace service;

use domain\Provider;

/**
 * @access public
 * @author roger.kaufmann
 */
interface ProviderService {

    /**
     * @access public
     * @param int providerId
     * @return Provider
     * @ParamType providerId int
     * @ReturnType Provider
     */
    public function readProvider($providerId);

    /**
     * @access public
     * @param Provider provider
     * @return Provider
     * @ParamType provider Provider
     * @ReturnType Provider
     */
    public function createProvider($providerId);

    /**
     * @access public
     * @param Provider provider
     * @return Provider
     * @ParamType provider Provider
     * @ReturnType Provider
     */
    public function updateProvider(Provider $provider);

    /**
     * @access public
     * @param int providerId
     * @ParamType providerId int
     */
    public function deleteProvider($providerId);

    /**
     * @access public
     * @return Provider[]
     * @ReturnType Provider[]
     */
    public function getAllProviders();

    /**
     * @access public
     * @return int
     * @ReturnType rowCount
     */
    public function getProvidersByUser($userId);
}