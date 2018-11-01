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
        echo print_r($allPrograms);
        foreach ($allPrograms as $program){
            if ($program->getisBilled() == true){
                unset($allPrograms[$program]);
            }
        }
        $new_array = array_filter($allPrograms, function($program){
            if ($program->getisBilled() == true) return false;
            return true;
        });

        usort($allPrograms, function(Program $a, Program $b)
        {
            return strcmp($a->getProviderId(), $b->getProviderId());
        });
        echo print_r($allPrograms);

    }

}