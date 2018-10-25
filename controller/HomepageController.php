<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 25.10.18
 * Time: 16:56
 */
namespace controller;

use domain\Program;
use service\ProgramServiceImpl;
use view\LayoutRendering;
use view\TemplateView;

class HomepageController
{
    public static function show()
    {
        $contentView = new TemplateView("view/homepage.php");
        $contentView->programs = (new ProgramServiceImpl())->getAllPrograms();
        LayoutRendering::basicLayout($contentView);
    }
}