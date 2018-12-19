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
use controller\EmailController;
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
    if(AuthController::getAdminType() == 1) {
        UserController::list();
    }else{
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }
});

Router::route_auth("GET", "/user/edit", $authFunction, function () {
    if(AuthController::getAdminType() == 1) {
        UserController::edit();
    }else{
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }
});

Router::route_auth("POST", "/user/update", $authFunction, function () {
    if(AuthController::getAdminType() == 1) {
        if(UserController::update());
        Router::redirect("/user/list");
    }else{
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }
});

Router::route_auth("GET", "/user/create", $authFunction, function () {
    if(AuthController::getAdminType() == 1) {
        UserController::create();
    }else{
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }
});

Router::route_auth("GET", "/user/delete", $authFunction, function () {
    if(AuthController::getAdminType() == 1) {
        UserController::delete();
        UserController::list();
    }else{
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }
});

Router::route("GET", "/user", function () {
    if(AuthController::getAdminType() == 1) {
        UserController::showDetails();
    }else{
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }
});

Router::route("GET", "/program", function () {
        ProgramController::showDetails();
});

Router::route_auth("GET", "/program/create", $authFunction, function () {
    if(AuthController::getAdminType() == 1 || AuthController::getAdminType() == 3) {
        ProgramController::create();
    }else{
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }
});
Router::route_auth("GET", "/program/edit", $authFunction, function () {
    if(AuthController::getAdminType() == 1 || AuthController::getAdminType() == 3) {
        ProgramController::edit();
    }else{
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }
});

Router::route_auth("GET", "/program/delete", $authFunction, function () {
    if(AuthController::getAdminType() == 1 || AuthController::getAdminType() == 3) {
        ProgramController::delete();
        HomepageController::show();
    }else{
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }
});
Router::route_auth("POST", "/program/update", $authFunction, function () {
    if(AuthController::getAdminType() == 1 || AuthController::getAdminType() == 3) {
        if(ProgramController::update());
        Router::redirect("/");
    }else{
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }
});

Router::route("GET", "/program/pdf/{id}", function ($id) {
    PDFController::generateProgramDetailPDF($id);
});

Router::route("GET", "/program/request", function(){
    if(EmailController::sendRequestInformation()) {
        Router::redirect("/user/list1");
    }else{
        Router::redirect("/user/list2");
    }
});


Router::route("GET", "/charging", function () {
    ChargingController::charging();
});

Router::route_auth("GET", "/provider/list", $authFunction, function () {
    if(AuthController::getAdminType() == 1 || AuthController::getAdminType() == 3) {
        ProviderController::list();
    }else{
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }
});

Router::route_auth("GET", "/provider/edit", $authFunction, function () {
    if(AuthController::getAdminType() == 1 || AuthController::getAdminType() == 3) {
        ProviderController::edit();
    }else{
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }
});

Router::route_auth("POST", "/provider/update", $authFunction, function () {
    if(AuthController::getAdminType() == 1 || AuthController::getAdminType() == 3) {
        if (ProviderController::update()) ;
        Router::redirect("/provider/list");
    }else{
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }
});

Router::route_auth("GET", "/provider/create", $authFunction, function () {
    if(AuthController::getAdminType() == 1 || AuthController::getAdminType() == 3) {
        ProviderController::create();
    }else{
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }
});

Router::route_auth("GET", "/provider/delete", $authFunction, function () {
    if(AuthController::getAdminType() == 1 || AuthController::getAdminType() == 3) {
        ProviderController::delete();
        ProviderController::list();
    }else{
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }
});

Router::route("GET", "/provider", function () {
    if(AuthController::getAdminType() == 1 || AuthController::getAdminType() == 3) {
        ProviderController::showDetails();
    }else{
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }
});

Router::route_auth("GET", "/advertisement/list", $authFunction, function () {
    if(AuthController::getAdminType() == 1 || AuthController::getAdminType() == 2) {
        AdvertisementController::list();
    }else{
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }
});
Router::route_auth("GET", "/advertisement/edit", $authFunction, function () {
    if(AuthController::getAdminType() == 1 || AuthController::getAdminType() == 2) {
        AdvertisementController::edit();
    }else{
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }
});

Router::route_auth("POST", "/advertisement/update", $authFunction, function () {
    if(AuthController::getAdminType() == 1 || AuthController::getAdminType() == 2) {
        if (AdvertisementController::update()) ;
        Router::redirect("/advertisement/list");
    }else{
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
        }
});

Router::route_auth("GET", "/advertisement/delete", $authFunction, function () {
    if(AuthController::getAdminType() == 1 || AuthController::getAdminType() == 2) {
        AdvertisementController::delete();
        AdvertisementController::list();
    }else{
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }
});

Router::route_auth("GET", "/advertisement/create", $authFunction, function () {
    if(AuthController::getAdminType() == 1 || AuthController::getAdminType() == 2) {
        AdvertisementController::create();
    }else{
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }
});

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
    ErrorController::showError($exception);
}