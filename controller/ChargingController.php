<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 22.10.2018
 * Time: 21:48
 */

namespace controller;

use domain\Program;
use service\ProgramServiceImpl;
use service\ProviderServiceImpl;
use view\TemplateView;
use http\HTTPException;


class ChargingController
{
    /**
     * @access public
     * @throws HTTPException
     */
    public static function charging(){
        echo (new TemplateView("empty.php"))->render();

        $programService = new ProgramServiceImpl();
        $allPrograms = $programService->getAllPrograms();

        $billingPrograms = array_filter($allPrograms, function(Program $program){
            if ($program->getisBilled() == true) return false;
            return true;
        });

        usort($billingPrograms, function(Program $a, Program $b)
        {
            return strcmp($a->getProviderId(), $b->getProviderId());
        });

        $providerid = 'initial';
        $providerPrograms = array();

        foreach ($billingPrograms as $program){

            if($providerid !== $program->getProviderID() && $providerid !== 'initial'){
                $provider = (new ProviderServiceImpl())->readProvider($program->getProviderID());
                $pdfContent = PDFController::generateProviderInvoicePDF($providerPrograms, $provider);
                echo $pdfContent;
                EmailController::sendInvoice($provider, $pdfContent);

                $providerPrograms = array();
            }
            $providerid = $program->getProviderID();
            array_push($providerPrograms, $program);
        }
        if(count($providerPrograms)>0)
            $provider = (new ProviderServiceImpl())->readProvider($providerid);
            $pdfContent = PDFController::generateProviderInvoicePDF($providerPrograms, $provider);
            EmailController::sendInvoice($provider, $pdfContent);
    }

}