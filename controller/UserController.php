<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 08.10.2017
 * Time: 22:20
 */

namespace controller;

use domain\User;
use service\AuthServiceImpl;
use validator\AgentValidator;
use validator\UserValidator;
use view\TemplateView;
use view\LayoutRendering;
use service\UserServiceImpl;
use dao\UserDAO;

use domain\Agent;

class UserController
{

    public static function create(){
        $contentView = new TemplateView("userEdit.php");
        LayoutRendering::basicLayout($contentView);
    }

    public static function list(){
        $contentView = new TemplateView("userList.php");
        $contentView->users = (new UserServiceImpl())->getAllUsers();
        LayoutRendering::basicLayout($contentView);
    }

    /**
     * @throws \http\HTTPException
     */
    public static function edit(){

        $id = $_GET["id"];
        $contentView = new TemplateView("userEdit.php");
        $contentView->user = (new UserServiceImpl())->readUser($id);

        LayoutRendering::basicLayout($contentView);
    }

    public static function update1(){
        $view = new TemplateView("agentEdit.php");
        $view->pageTitle = "WE-CRM";
        $view->pageHeading = "<strong>WE-CRM | Update</strong> your account.";
        $view->pageSubmitText = "Update";
        $view->pageFormAction = "/agent/edit";
        return self::register($view);
    }

    /**
     * @return bool
     * @throws \http\HTTPException
     */
    public static function update(){
        $user = new User();
        $user->setId($_POST["id"]);
        $user->setFirstname($_POST["firstname"]);
        $user->setLastname($_POST["lastname"]);
        $user->setEmail($_POST["email"]);
        $user->setPassword($_POST["password"]);
        $user->setPasswordRepeat($_POST["passwordRepeat"]);

        if($_POST["adminType"] === "1"){
            $user->setAdmin(true);
            $user->setProviderAdmin(false);
            $user->setAdAdmin(false);
        }

            else if($_POST["adminType"] === "2"){
                $user->setAdmin(false);
                $user->setProviderAdmin(true);
                $user->setAdAdmin(false);
            }

            else{
                $user->setAdmin(false);
                $user->setProviderAdmin(false);
                $user->setAdAdmin(true);
            }

        $userValidator = new UserValidator($user);

        if($userValidator->isValid()) {
            if ($user->getId() === "") {
                (new UserServiceImpl())->createUser($user);
            } else {
                (new UserServiceImpl())->updateUser($user);
            }
        }
        else{
            $contentView = new TemplateView("userEdit.php");
            $contentView->user = $user;
            $contentView->userValidator = $userValidator;
            LayoutRendering::basicLayout($contentView);
            return false;
        }
        return true;
    }

    public static function loginView(){
        $loginView = new TemplateView("userLogin.php");
        LayoutRendering::basicLayout($loginView);
        //echo (new TemplateView("userLogin.php"))->render();
    }

    public function getAllUsers() {
        $userDAO = new UserDAO();
        return $userDAO->getAllUsers();

    }

    public static function showDetails()
    {
        $id = $_GET["id"];
        $contentView = new TemplateView("view/userDetail.php");
        $contentView->user = (new UserServiceImpl())->readUser($id);
        LayoutRendering::basicLayout($contentView);
    }

    public static function delete(){
        $id = $_GET["id"];
        (new UserServiceImpl())->deleteUser($id);
    }
}
