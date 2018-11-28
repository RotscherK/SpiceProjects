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

class AdvertisementController{

    public static function create(){
        $contentView = new TemplateView("advertisementEdit.php");
        $contentView->users = (new UserServiceImpl())->getAllUsers();
        LayoutRendering::basicLayout($contentView);
    }

    public static function list(){
        $contentView = new TemplateView("advertisementList.php");
        $contentView->advertisement = (new AdvertisementServiceImpl())->getAllAdvertisements();
        $contentView->users = (new AdvertisementServiceImpl())->getAdvertisementAdmins();
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

    public static function delete(){
        $id = $_GET["id"];
        (new AdvertisementServiceImpl())->deleteAdvertisement($id);
    }

    /**
     * @return bool
     * @throws \http\HTTPException
     */
    public static function update(){
        $advertisement = new Advertisement();
        $advertisement->setId($_POST["id"]);
        $advertisement->setTitle($_POST["title"]);
        $advertisement->setContent($_POST["content"]);
        $advertisement->setURL($_POST["url"]);
        $advertisement->setUserAdmin($_POST["administrator"]);

        $advertisementValidator = new AdvertisementValidator($advertisement);

        if($advertisementValidator->isValid()) {
            if ($advertisement->getId() === "") {
                (new AdvertisementServiceImpl())->createAdvertisement($advertisement);
            } else {
                (new AdvertisementServiceImpl())->updateAdvertisement($advertisement);
            }
        }
        else{
            $contentView = new TemplateView("advertisementEdit.php");
            $contentView->advertisement = $advertisement;
            $contentView->advertisementValidator = $advertisementValidator;
            $contentView->users = (new UserServiceImpl())->getAllUsers();
            LayoutRendering::basicLayout($contentView);
            return false;
        }
        return true;
    }




}