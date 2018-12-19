<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 01.11.2017
 * Time: 13:51
 */

namespace controller;

use domain\Provider;
use service\AuthServiceImpl;
use view\TemplateView;
use service\EmailServiceClient;
use service\ProgramServiceImpl;

class EmailController
{
    public static function sendInvoice($provider, $pdfContent){
        $emailView = new TemplateView("programInvoiceEmail.php");
        $emailView->provider = $provider;
        return EmailServiceClient::sendEmail("roger.kaufmann1@students.fhnw.ch", "Monthly Invoice", $emailView->render(), true, $pdfContent, "Invoice.pdf");
        //return EmailServiceClient::sendEmail($provider->getBillingEmail(), "Monthly Invoice", $emailView->render(), true, $pdfContent, "Invoice.pdf");

    }

    public static function sendRequestInformation(){

        $emailView = new TemplateView("programRequestInformationEmail.php");
        $emailView->program = (new ProgramServiceImpl())->readProgram($_POST["programid"]);
        $emailView->name = $_POST["name"];
        $emailView->email = $_POST["email"];
        $emailView->phone = $_POST["phone"];
        $emailView->comment = $_POST["comment"];

        return EmailServiceClient::sendEmail("t_applewhite@bluewin.ch", "Request for Information", $emailView-render(),
            false, "", "");
    }
}