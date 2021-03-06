<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 08.10.2017
 * Time: 22:20
 */

namespace controller;

use domain\Provider;
use validator\ProviderValidator;
use service\UserServiceImpl;
use view\TemplateView;
use view\LayoutRendering;
use service\ProviderServiceImpl;
use dao\ProviderDAO;

class ProviderController{

    public static function create(){
        $contentView = new TemplateView("providerEdit.php");
       // $contentView->users = (new ProviderServiceImpl())->getProviderAdmins();
        $contentView->users = (new UserServiceImpl())->getAllUsers();
        LayoutRendering::basicLayout($contentView);

    }

    public static function list(){
        $contentView = new TemplateView("providerList.php");
        $contentView->providers = (new ProviderServiceImpl())->getAllProviders();
        LayoutRendering::basicLayout($contentView);
    }

    /**
     * @throws \http\HTTPException
     */
    public static function edit(){

        $id = $_GET["id"];
        $contentView = new TemplateView("providerEdit.php");
        $contentView->provider = (new ProviderServiceImpl())->readProvider($id);
        $contentView->users = (new UserServiceImpl())->getAllUsers();

        LayoutRendering::basicLayout($contentView);
    }

    /**
     * @return bool
     * @throws \http\HTTPException
     */
    public static function update(){
        $provider = new Provider();
        $provider->setId($_POST["id"]);
        $provider->setName($_POST["name"]);
        $provider->setDescription($_POST["description"]);
        $provider->setPlz($_POST["plz"]);
        $provider->setCity($_POST["city"]);
        $provider->setStreet($_POST["street"]);
        $provider->setBillingEmail($_POST["billingEmail"]);
        $provider->setAdministrator($_POST["administrator"]);

        $providerValidator = new providerValidator($provider);

        if($providerValidator->isValid()) {
            if ($provider->getId() === "") {
                (new ProviderServiceImpl())->createProvider($provider);
            } else {
                (new ProviderServiceImpl())->updateProvider($provider);
            }
        }
        else{
            $contentView = new TemplateView("providerEdit.php");
            $contentView->provider = $provider;
            $contentView->providerValidator = $providerValidator;
            $contentView->users = (new UserServiceImpl())->getAllUsers();
            LayoutRendering::basicLayout($contentView);
            return false;
        }
        return true;
    }

    public static function showDetails()
    {
        $id = $_GET["id"];
        $contentView = new TemplateView("view/providerDetail.php");
        $contentView->provider = (new ProviderServiceImpl())->readProvider($id);
        LayoutRendering::basicLayout($contentView);
    }
    public static function delete(){
        $id = $_GET["id"];
        (new ProviderServiceImpl())->deleteProvider($id);
    }




}