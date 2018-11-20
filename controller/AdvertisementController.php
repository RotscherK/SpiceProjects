<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 08.10.2017
 * Time: 22:20
 */

namespace controller;

use domain\Advertisement;
use validator\AdvertisementValidator;
use service\UserServiceImpl;
use view\TemplateView;
use view\LayoutRendering;
use service\AdvertisementServiceImpl;
use dao\AdvertisementDAO;

class ProviderController{

    public static function create(){
        $contentView = new TemplateView("advertisementEdit.php");
        LayoutRendering::basicLayout($contentView);
    }

    public static function list(){
        $contentView = new TemplateView("advertisementList.php");
        $contentView->advertisement = (new AdvertisementServiceImpl())->getAllProviders();
        $contentView->users = (new AdvertisementServiceImpl())->getProviderAdmins();
        LayoutRendering::basicLayout($contentView);
    }

    /**
     * @throws \http\HTTPException
     */
    public static function edit(){

        $id = $_GET["id"];
        $contentView = new TemplateView("advertisementEdit.php");
        $contentView->advertisement = (new AdvertisementServiceImpl())->readAdvertisement($id);
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
            LayoutRendering::basicLayout($contentView);
            return false;
        }
        return true;
    }




}