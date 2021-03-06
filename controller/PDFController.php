<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 31.10.2018
 * Time: 15:00
 */

namespace controller;

use service\ProgramServiceImpl;
use view\TemplateView;
use service\PDFServiceClient;
use service\ProviderServiceImpl;

class PDFController
{
    public static function generateProgramDetailPDF($id){
        $pdfView = new TemplateView("programDetailPDF.php");
        $pdfView->program = (new ProgramServiceImpl())->readProgram($id);
        $result = PDFServiceClient::sendPDF($pdfView->render());
        header("Content-Type: application/pdf", NULL, 200);
        echo $result;
    }
    public static function generateProviderInvoicePDF($billingPrograms, $provider){
        $pdfView = new TemplateView("programInvoicePDF.php");
        $pdfView->billingPrograms = $billingPrograms;
        $pdfView->provider = $provider;
        $result = PDFServiceClient::sendPDF($pdfView->render());
        return $result;
    }
}