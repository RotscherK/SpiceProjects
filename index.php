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
use controller\AuthController;
use controller\ErrorController;
use controller\UserPasswordResetController;
use controller\EmailController;
use controller\PDFController;
use view\TemplateView;
use view\LayoutRendering;
use http\HTTPException;
use http\HTTPHeader;
use http\HTTPStatusCode;

session_start();

error_log("Test", 3, "./error.log");

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

Router::route("GET", "/register", function () {
    UserController::registerView();
});

Router::route("POST", "/register", function () {
    if(UserController::register())
        Router::redirect("/logout");
});

Router::route("POST", "/login", function () {
    if(AuthController::login()){}
        HomepageController::show();
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

Router::route_auth("GET", "/agent/edit", $authFunction, function () {
    UserController::editView();
});

Router::route_auth("POST", "/agent/edit", $authFunction, function () {
    if(UserController::update())
        Router::redirect("/logout");
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
    Router::redirect("/");
});

Router::route_auth("POST", "/program/update", $authFunction, function () {
    if(ProgramController::update());
        //Router::redirect("/");
});

Router::route_auth("GET", "/customer/email", $authFunction, function () {
    EmailController::sendMeMyCustomers();
    Router::redirect("/");
});

Router::route_auth("GET", "/customer/pdf", $authFunction, function () {
    PDFController::generatePDFCustomers();
});


try {
    HTTPHeader::setHeader("Access-Control-Allow-Origin: *");
    HTTPHeader::setHeader("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS, HEAD");
    HTTPHeader::setHeader("Access-Control-Allow-Headers: Authorization, Location, Origin, Content-Type, X-Requested-With");
    if($_SERVER['REQUEST_METHOD']=="OPTIONS") {
        HTTPHeader::setStatusHeader(HTTPStatusCode::HTTP_204_NO_CONTENT);
    } else {
        Router::call_route($_SERVER['REQUEST_METHOD'], $_SERVER['PATH_INFO']);
    }
} catch (HTTPException $exception) {
    $exception->getHeader();

     // $contentView = new TemplateView("404page.php");
    // $contentView->exception = $exception;
   // LayoutRendering::basicLayout($contentView);

    $exception->getHeader();
    //ErrorController::show404();
}