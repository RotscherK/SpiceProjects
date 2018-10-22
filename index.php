<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 12.09.2017
 * Time: 21:30
 */
require_once("config/Autoloader.php");

use router\Router;
use controller\CustomerController;
use controller\AgentController;
use controller\AuthController;
use controller\ErrorController;
use controller\AgentPasswordResetController;
use controller\EmailController;
use controller\PDFController;
use service\ServiceEndpoint;
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

Router::route("GET", "/login", function () {
    AgentController::loginView();
});

Router::route("POST", "/login", function () {
    AuthController::login();
    Router::redirect("/");
});

Router::route("GET", "/logout", function () {
    AuthController::logout();
    Router::redirect("/login");
});

Router::route("POST", "/password/request", function () {
    AgentPasswordResetController::resetEmail();
    Router::redirect("/login");
});

Router::route("GET", "/password/request", function () {
    AgentPasswordResetController::requestView();
});

Router::route("POST", "/password/reset", function () {
    AgentPasswordResetController::reset();
    Router::redirect("/login");
});

Router::route("GET", "/password/reset", function () {
    AgentPasswordResetController::resetView();
});

Router::route_auth("GET", "/customer/email", $authFunction, function () {
    EmailController::sendMeMyCustomers();
    Router::redirect("/");
});

Router::route_auth("GET", "/customer/pdf", $authFunction, function () {
    PDFController::generatePDFCustomers();
});

$authAPIBasicFunction = function () {
    if (ServiceEndpoint::authenticateBasic())
        return true;
    Router::errorHeader();
    return false;
};

Router::route_auth("GET", "/api/token", $authAPIBasicFunction, function () {
    ServiceEndpoint::loginBasicToken();
});

$authAPITokenFunction = function () {
    if (ServiceEndpoint::authenticateToken())
        return true;
    Router::errorHeader();
    return false;
};

Router::route_auth("HEAD", "/api/token", $authAPITokenFunction, function () {
    ServiceEndpoint::validateToken();
});

Router::route_auth("GET", "/api/customer", $authAPITokenFunction, function () {
    ServiceEndpoint::findAllCustomer();
});

Router::route_auth("GET", "/api/customer/{id}", $authAPITokenFunction, function ($id) {
    ServiceEndpoint::readCustomer($id);
});

Router::route_auth("PUT", "/api/customer/{id}", $authAPITokenFunction, function ($id) {
    ServiceEndpoint::updateCustomer($id);
});

Router::route_auth("POST", "/api/customer", $authAPITokenFunction, function () {
    ServiceEndpoint::createCustomer();
});

Router::route_auth("DELETE", "/api/customer/{id}", $authAPITokenFunction, function ($id) {
    ServiceEndpoint::deleteCustomer($id);
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
    ErrorController::show404();
}