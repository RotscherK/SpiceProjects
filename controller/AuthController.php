<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 09.10.2017
 * Time: 08:30
 */

namespace controller;

use domain\User;
use service\AuthServiceImpl;
use view\LayoutRendering;
use view\TemplateView;
use validator\UserValidator;

class AuthController
{

    public static function authenticate(){
        if (isset($_SESSION["userLogin"])) {
            if(AuthServiceImpl::getInstance()->validateToken($_SESSION["userLogin"]["token"])) {
                return true;
            }
        }
        if (isset($_COOKIE["token"])) {
            if(AuthServiceImpl::getInstance()->validateToken($_COOKIE["token"])) {
                return true;
            }
        }
        return false;
    }

    public static function login(){

        $authService = AuthServiceImpl::getInstance();

        $user = new User();
        $user->setEmail($_POST["email"]);
        $user->setPassword($_POST["password"]);
        $userValidator = new UserValidator($user);

        if($userValidator->isValid()) {

            if($authService->verifyUser($_POST["email"],$_POST["password"])){
                session_regenerate_id(true);
                $token = $authService->issueToken();
                $_SESSION["userLogin"]["token"] = $token;
                if(isset($_POST["remember"])) {
                    setcookie("token", $token, (new \DateTime('now'))->modify('+30 days')->getTimestamp(), "/");
                }
            }
        }else{
            $contentView = new TemplateView("userLogin.php");
            $contentView->user = $user;
            $contentView->userValidator = $userValidator;
            LayoutRendering::basicLayout($contentView);
            return false;
        }
        return true;
    }

    public static function logout(){
        session_destroy();
        setcookie("token","",time() - 3600, "/");
    }

}