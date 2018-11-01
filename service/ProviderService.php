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

}