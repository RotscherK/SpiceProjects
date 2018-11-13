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
use view\TemplateView;
use view\LayoutRendering;
use service\ProviderServiceImpl;
use dao\ProviderDAO;

class ProviderController{

    public static function create(){
        $contentView = new TemplateView("providerEdit.php");
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
        $contentView->user = (new ProviderServiceImpl())->readProvider($id);

        LayoutRendering::basicLayout($contentView);
    }




}