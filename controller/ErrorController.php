<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 12.12.2018
 * Time: 18:39
 */

namespace controller;

use view\TemplateView;
use http\HTTPException;
use view\LayoutRendering;

class ErrorController
{
    public static function showError(HTTPException $exception){
        $contentView = new TemplateView("404page.php");
        $contentView->exceptionCode = substr($exception->getStatusCode(), 0, 3);
        $contentView->exceptionText = substr($exception->getStatusCode(), 3);
        $contentView->exception = $exception;

        LayoutRendering::basicLayout($contentView);
    }
}