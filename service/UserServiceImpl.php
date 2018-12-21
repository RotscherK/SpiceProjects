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
            //$user->setAgentId(AuthServiceImpl::getInstance()->getCurrentAgentId());
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
     * @param int userId
     * @return User
     * @ParamType userId int
     * @ReturnType User
     * @throws HTTPException
     */
    public function readUserBasic($userId) {
        $userDAO = new UserDAO();
        return $userDAO->readBasic($userId);
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
            return;
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    /**
     *
     * @access public
     * @return User[]
     * @ReturnType User[]
     * @throws HTTPException
     */
    public function findAllUser() {
        if(AuthServiceImpl::getInstance()->verifyAuth()){
            $userDAO = new UserDAO();
            return $userDAO->findByEmail(AuthServiceImpl::getInstance()->getCurrentAgentId());
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    /**
     *
     * @access public
     * @return int
     * @ReturnType rowCount
     * @throws HTTPException
     */
    public function checkForEmail($userEmail) {
        if(AuthServiceImpl::getInstance()->verifyAuth()){
            $userDAO = new UserDAO();
            return $userDAO->checkForEmail($userEmail);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }




    /**
     * @access public
     * @return User[]
     * @ReturnType User[]
     * @throws HTTPException
     */
    public function getAllUsers() {
        $userDAO = new UserDAO();
        return $userDAO->getAllUsers();
    }



}