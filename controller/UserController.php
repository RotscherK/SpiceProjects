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
use validator\UserValidator2;
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
    
    public static function editView(){
        $view = new TemplateView("agentEdit.php");
        $view->agent = AuthServiceImpl::getInstance()->readUser();
        $view->pageTitle = "WE-CRM";
        $view->pageHeading = "<strong>WE-CRM | Update</strong> your account.";
        $view->pageSubmitText = "Update";
        $view->pageFormAction = "/agent/edit";
        echo $view->render();
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


    public static function registerView(){
        echo (new TemplateView("agentEdit.php"))->render();
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

        if($_POST["adminType"] == '1'){
            $user->setSiteAdmin(TRUE);
            $user->setProviderAdmin(FALSE);
            $user->setAdAdmin(FALSE);
        }

            else if($_POST["adminType"] == '2'){
                $user->setSiteAdmin(TRUE);
                $user->setProviderAdmin(TRUE);
                $user->setAdAdmin(TRUE);
            }

            else{
                $user->setSiteAdmin(FALSE);
                $user->setProviderAdmin(FALSE);
                $user->setAdAdmin(TRUE);
            }

            $test = $_POST["adminType"];

        echo "<script language='javascript'>alert('result: '.$test. ' :)');</script>";

        $userValidator2 = new UserValidator2($user);

        if($userValidator2->isValid()) {
            if ($user->getId() === "") {
                (new UserServiceImpl())->createUser($user);
            } else {
                (new UserServiceImpl())->updateUser($user);
            }
        }
        else{
            $contentView = new TemplateView("userEdit.php");
            $contentView->user = $user;
            $contentView->userValidator = $userValidator2;
            LayoutRendering::basicLayout($contentView);
            return false;
        }
        return true;
    }

    public static function register($view = null){
        $agent = new Agent();
        $agent->setName($_POST["name"]);
        $agent->setEmail($_POST["email"]);
        $agent->setPassword($_POST["password"]);
        $agentValidator = new AgentValidator($agent);
        if($agentValidator->isValid()){
            if(AuthServiceImpl::getInstance()->editAgent($agent->getName(),$agent->getEmail(), $agent->getPassword())){
                return true;
            }else{
                $agentValidator->setEmailError("Email already exists");
            }
        }
        $agent->setPassword("");
        if (is_null($view))
            $view = new TemplateView("agentEdit.php");
        $view->agent = $agent;
        $view->agentValidator = $agentValidator;
        echo $view->render();
        return false;
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
}
