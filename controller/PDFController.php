<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 01.11.2017
 * Time: 13:51
 */

namespace controller;

use service\UserServiceImpl;
use view\TemplateView;
use service\PDFServiceClient;

class PDFController
{
    public static function generatePDFCustomers(){
        $pdfView = new TemplateView("customerListPDF.php");
        $pdfView->customers = (new UserServiceImpl())->findAllCustomer();
        $result = PDFServiceClient::sendPDF($pdfView->render());
        header("Content-Type: application/pdf", NULL, 200);
        echo $result;
    }
}