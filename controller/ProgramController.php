<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 22.10.2018
 * Time: 21:48
 */

namespace controller;

use domain\Program;
use validator\ProgramValidator;
use service\ProgramServiceImpl;
use view\TemplateView;
use view\LayoutRendering;

class ProgramController
{
    public static function create(){
        $contentView = new TemplateView("programEdit.php");
        LayoutRendering::basicLayout($contentView);
    }

    public static function readAll(){
        $contentView = new TemplateView("programs.php");
        $contentView->programs = (new ProgramServiceImpl())->findAllPrograms();
        LayoutRendering::basicLayout($contentView);
    }

    public static function edit(){
        $id = $_GET["id"];
        $contentView = new TemplateView("programEdit.php");
        $contentView->program = (new ProgramServiceImpl())->readProgram($id);
        LayoutRendering::basicLayout($contentView);
    }

    public static function update(){
        $program = new Program();
        $program->setId($_POST["id"]);
        $program->setName($_POST["name"]);
        $program->setDescription($_POST["description"]);
        $program->setPrice($_POST["price"]);
        $program->setExpirationDate($_POST["expiration_date"]);
        $program->setRequirement($_POST["requirement"]);
        $program->setUniversityId($_POST["university_id"]);
        $programValidator = new ProgramValidator($program);
        if($programValidator->isValid()) {
            if ($program->getId() === "") {
                (new ProgramServiceImpl())->createProgram($program);
            } else {
                (new ProgramServiceImpl())->updateProgram($program);
            }
        }
        else{
            $contentView = new TemplateView("programEdit.php");
            $contentView->program = $program;
            $contentView->programValidator = $programValidator;
            LayoutRendering::basicLayout($contentView);
            return false;
        }
        return true;
    }

    public static function delete(){
        $id = $_GET["id"];
        (new ProgramServiceImpl())->deleteProgram($id);
    }

}