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
use validator\LoginValidator;
use service\EmailServiceClient;
use view\LayoutRendering;

class UserPasswordResetController
{

    public static function resetView(){
        $contentView = new TemplateView("userPasswordReset.php");
        $contentView->token = $_POST["token"];
        LayoutRendering::basicLayout($contentView);
    }
    
    public static function requestView(){
        $contentView = new TemplateView("userPasswordResetRequest.php");
        LayoutRendering::basicLayout($contentView);
    }
    
    public static function reset(){
        if(AuthServiceImpl::getInstance()->validateToken($_POST["token"])){
            $user = AuthServiceImpl::getInstance()->readUser();
            $user->setPassword($_POST["password"]);
            $userValidator = new LoginValidator($user);
            if($userValidator->isValid()){
                if(AuthServiceImpl::getInstance()->editUser($user->getEmail(), $user->getPassword())){
                    return true;
                }
            }
            $user->setPassword("");
            $contentView = new TemplateView("userPasswordReset.php");
            $contentView->token = $_POST["token"];
            LayoutRendering::basicLayout($contentView);
            return false;
        }
        return false;
    }

    public static function resetEmail(){
        $token = AuthServiceImpl::getInstance()->issueToken(AuthServiceImpl::RESET_TOKEN, $_POST["email"]);
        $emailView = new TemplateView("userPasswordResetEmail.php");
        $emailView->resetLink = $GLOBALS["ROOT_URL"] . "/password/reset?token=" . $token;
        return EmailServiceClient::sendEmail($_POST["email"], "Password Reset Email", $emailView->render(), false, null, null);
    }

}