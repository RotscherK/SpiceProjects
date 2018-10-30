<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 16.10.2017
 * Time: 14:26
 */

namespace controller;

use service\AuthServiceImpl;
use view\TemplateView;
use validator\UserValidator;
use service\EmailServiceClient;

class UserPasswordResetController
{

    public static function resetView(){
        $resetView = new TemplateView("userPasswordReset.php");
        $resetView->token = $_GET["token"];
        echo $resetView->render();
    }
    
    public static function requestView(){
        echo (new TemplateView("userPasswordResetRequest.php"))->render();
    }
    
    public static function reset(){
        if(AuthServiceImpl::getInstance()->validateToken($_POST["token"])){
            $user = AuthServiceImpl::getInstance()->readUser();
            $user->setPassword($_POST["password"]);
            $userValidator = new UserValidator($user);
            if($userValidator->isValid()){
                if(AuthServiceImpl::getInstance()->editUser($user->getEmail(), $user->getPassword())){
                    return true;
                }
            }
            $user->setPassword("");
            $resetView = new TemplateView("userPasswordReset.php");
            $resetView->token = $_POST["token"];
            echo $resetView->render();
            return false;
        }
        return false;
    }

    public static function resetEmail(){
        $token = AuthServiceImpl::getInstance()->issueToken(AuthServiceImpl::RESET_TOKEN, $_POST["email"]);
        $emailView = new TemplateView("userPasswordResetEmail.php");
        $emailView->resetLink = $GLOBALS["ROOT_URL"] . "/password/reset?token=" . $token;
        return EmailServiceClient::sendEmail($_POST["email"], "Password Reset Email", $emailView->render());
    }

}