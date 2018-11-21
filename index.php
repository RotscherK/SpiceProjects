<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 12.09.2017
 * Time: 21:30
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("config/Autoloader.php");

use router\Router;
use controller\HomepageController;
use controller\ProgramController;
use controller\UserController;
use controller\ProviderController;
use controller\AdvertisementController;
use controller\AuthController;
use controller\ErrorController;
use controller\UserPasswordResetController;
use controller\ChargingController;
use controller\PDFController;
use view\TemplateView;
use view\LayoutRendering;
use http\HTTPException;
use http\HTTPHeader;
use http\HTTPStatusCode;

session_start();

$authFunction = function () {
    if (AuthController::authenticate())
        return true;
    Router::redirect("/login");

    return false;
};

Router::route("GET", "/", function () {
    HomepageController::show();
});

Router::route("GET", "/login", function () {
    UserController::loginView();
});

/*
Router::route("GET", "/register", function () {
    UserController::registerView();
});

Router::route("POST", "/register", function () {
    if(UserController::register())
        Router::redirect("/logout");
});
*/

Router::route("POST", "/login", function () {
    if(AuthController::login()){
        if(isset($_SESSION["currentPath"]) ){
            Router::redirect($_SESSION["currentPath"]);
        }
        HomepageController::show();
    }

});

Router::route("GET", "/logout", function () {
    AuthController::logout();
    Router::redirect("/");
});

Router::route("POST", "/password/request", function () {
    UserPasswordResetController::resetEmail();
    Router::redirect("/login");
});

Router::route("GET", "/password/request", function () {
    UserPasswordResetController::requestView();
});

Router::route("POST", "/password/reset", function () {
    UserPasswordResetController::reset();
    Router::redirect("/login");
});

Router::route("GET", "/password/reset", function () {
    UserPasswordResetController::resetView();
});

Router::route_auth("GET", "/user/list", $authFunction, function () {
    UserController::list();
});

Router::route_auth("GET", "/user/edit", $authFunction, function () {
    UserController::edit();
});

Router::route_auth("POST", "/user/update", $authFunction, function () {
    if(UserController::update());
    Router::redirect("/user/list");
});

Router::route_auth("GET", "/user/create", $authFunction, function () {
    UserController::create();
});

Router::route_auth("GET", "/user/delete", $authFunction, function () {
    Router::redirect("/user/list");
    UserController::delete();

});

Router::route("GET", "/user", function () {
    UserController::showDetails();
});

Router::route("GET", "/program", function () {
    ProgramController::showDetails();
});

Router::route_auth("GET", "/program/create", $authFunction, function () {
    ProgramController::create();
});

Router::route_auth("GET", "/program/edit", $authFunction, function () {
    ProgramController::edit();
});

Router::route_auth("GET", "/program/delete", $authFunction, function () {
    ProgramController::delete();
    HomepageController::show();
});

Router::route_auth("POST", "/program/update", $authFunction, function () {
    if(ProgramController::update());
        Router::redirect("/");
});
Router::route("GET", "/program/pdf/{id}", function ($id) {
    PDFController::generateProgramDetailPDF($id);
});
Router::route("GET", "/charging", function () {
    ChargingController::charging();
});

Router::route_auth("GET", "/provider/list", $authFunction, function () {
    ProviderController::list();
});

Router::route_auth("GET", "/provider/edit", $authFunction, function () {
    ProviderController::edit();
});

Router::route_auth("POST", "/provider/update", $authFunction, function () {
    if(ProviderController::update());
    Router::redirect("/provider/list");
});

Router::route_auth("GET", "/advertisement/list", $authFunction, function () {
    AdvertisementController::list();
});

Router::route_auth("GET", "/advertisement/edit", $authFunction, function () {
    AdvertisementController::edit();
});

Router::route_auth("POST", "/advertisement/update", $authFunction, function () {
    if(AdvertisementController::update());
    Router::redirect("/advertisement/list");
});

/*
Router::route_auth("GET", "/customer/email", $authFunction, function () {
    EmailController::sendMeMyCustomers();
    Router::redirect("/");
});

Router::route_auth("GET", "/customer/pdf", $authFunction, function () {
    PDFController::generatePDFCustomers();
});
*/

try {
    HTTPHeader::setHeader("Access-Control-Allow-Origin: *");
    HTTPHeader::setHeader("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS, HEAD");
    HTTPHeader::setHeader("Access-Control-Allow-Headers: Authorization, Location, Origin, Content-Type, X-Requested-With");
    if($_SERVER['REQUEST_METHOD']=="OPTIONS") {
        HTTPHeader::setStatusHeader(HTTPStatusCode::HTTP_204_NO_CONTENT);
    } else {
        if ($_SERVER['PATH_INFO'] !== '/login'){
            $_SESSION["currentPath"] = $_SERVER['PATH_INFO'];
        }
        Router::call_route($_SERVER['REQUEST_METHOD'], $_SERVER['PATH_INFO']);
    }
} catch (HTTPException $exception) {
    $exception->getHeader();

     $contentView = new TemplateView("404page.php");
    $contentView->exceptionCode = substr($exception->getStatusCode(), 0, 3);
    $contentView->exceptionText =  substr($exception->getStatusCode(), 3);
    $contentView->exception = $exception;

    LayoutRendering::basicLayout($contentView);

    //$exception->getHeader();
    //ErrorController::show404();
}
