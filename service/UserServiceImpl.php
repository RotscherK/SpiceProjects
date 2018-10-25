<?php
/**
* Created by PhpStorm.
 * User: roger.kaufmann
* Date: 25.10.2018
* Time: 10:08
*/


namespace service;

use domain\User;
use dao\UserDAO;
use http\HTTPException;
use http\HTTPStatusCode;

class UserServiceImpl implements UserService
{
    /**
     * @access public
     * @param User user
     * @return User
     * @ParamType user User
     * @ReturnType User
     * @throws HTTPException
     */
    public function createUser(User $user) {
        if(AuthServiceImpl::getInstance()->verifyAuth()) {
            $userDAO = new UserDAO();
            $user->setAgentId(AuthServiceImpl::getInstance()->getCurrentAgentId());
            return $userDAO->create($user);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    /**
     * @access public
     * @param int userId
     * @return User
     * @ParamType userId int
     * @ReturnType User
     * @throws HTTPException
     */
    public function readUser($userId) {
        if(AuthServiceImpl::getInstance()->verifyAuth()) {
            $userDAO = new UserDAO();
            return $userDAO->read($userId);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    /**
     * @access public
     * @param User user
     * @return User
     * @ParamType user User
     * @ReturnType User
     * @throws HTTPException
     */
    public function updateUser(User $user) {
        if(AuthServiceImpl::getInstance()->verifyAuth()) {
            $userDAO = new UserDAO();
            return $userDAO->update($user);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    /**
     * @access public
     * @param int userId
     * @ParamType userId int
     */
    public function deleteUser($userId) {
        if(AuthServiceImpl::getInstance()->verifyAuth()) {
            $userDAO = new UserDAO();
            $user = new User();
            $user->setId($userId);
            $userDAO->delete($user);
        }
    }

    /**
     * @access public
     * @return User[]
     * @ReturnType User[]
     * @throws HTTPException
     */
    public function getAllUser() {
        if(AuthServiceImpl::getInstance()->verifyAuth()){
            $userDAO = new UserDAO();
            return $userDAO->findByAgent(AuthServiceImpl::getInstance()->getCurrentAgentId());
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }
}