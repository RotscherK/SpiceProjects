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
use view\TemplateView;


class ChargingController
{

    public static function charging(){
        echo (new TemplateView("empty.php"))->render();

        $programService = new ProgramServiceImpl();
        $allPrograms = $programService->getAllPrograms();
        //echo print_r($allPrograms) . "</br>";

        $billingPrograms = array_filter($allPrograms, function(Program $program){
            if ($program->getisBilled() == true) return false;
            return true;
        });

        usort($billingPrograms, function(Program $a, Program $b)
        {
            return strcmp($a->getProviderId(), $b->getProviderId());
        });
        //echo print_r($billingPrograms) . "</br>";

        $providerid = 'initial';
        $providerPrograms = array();

        foreach ($billingPrograms as $program){

            if($providerid == $program->getProviderID() || $providerid == 'initial'){
                array_push($providerPrograms, $program);
                $providerid = $program->getProviderID();
            }else{
                PDFController::generateProviderInvoicePDF($providerPrograms, $providerid);
                $providerid = $program->getProviderID();
                $providerPrograms = array();
            }

        }
        if(count($providerPrograms)>0)
                PDFController::generateProviderInvoicePDF($providerPrograms, $providerid);

    }

}