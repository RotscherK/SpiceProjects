<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 01.11.2017
 * Time: 13:51
 */

namespace controller;

use service\AuthServiceImpl;
use view\TemplateView;
use service\EmailServiceClient;

class EmailController
{
    public static function sendInvoice($provider, $pdfContent){
        $emailView = new TemplateView("programInvoiceEmail.php");
        $emailView->provider = $provider;
        //return EmailServiceClient::sendEmail($provider->getBillingEmail(), "Monthly Invoice", $emailView->render(), true, $pdfContent, "Invoice.pdf");
        //return EmailServiceClient::sendEmail("roger.kaufmann1@students.fhnw.ch", "Monthly Invoice", $emailView->render(), true, $pdfContent, "Invoice.pdf");
        return EmailServiceClient::sendEmail("roger.kaufmann1@students.fhnw.ch", "Monthly Invoice", $emailView->render(), true, "", "Invoice.pdf");
    }
}