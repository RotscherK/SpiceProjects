<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 25.10.2018
 * Time: 10:08
 */

namespace service;

use domain\User;

/**
 * @access public
 * @author roger.kaufmann
 */
interface UserService {

    /**
     * @access public
     * @param User user
     * @return User
     * @ParamType user User
     * @ReturnType User
     */
    public function createUser(User $user);

    /**
     * @access public
     * @param int userId
     * @return User
     * @ParamType userId int
     * @ReturnType User
     */
    public function readUser($userId);

    /**
     * @access public
     * @param User user
     * @return User
     * @ParamType user User
     * @ReturnType User
     */
    public function updateUser(User $user);

    /**
     * @access public
     * @param int userId
     * @ParamType userId int
     */
    public function deleteUser($userId);

    /**
     * @access public
     * @return User[]
     * @ReturnType User[]
     */
    public function findAllUser();
}