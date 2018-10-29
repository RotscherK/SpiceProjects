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
use service\AuthServiceImpl;
use dao\ProgramDAO;
use view\TemplateView;
use view\LayoutRendering;
use http\HTTPException;
use http\HTTPStatusCode;

class ProgramController
{
    public static function create(){
        $contentView = new TemplateView("programEdit.php");
        LayoutRendering::basicLayout($contentView);
    }

    /**
     * @throws \http\HTTPException
     */
    public static function readAll(){
        $contentView = new TemplateView("programs.php");
        $contentView->programs = (new ProgramServiceImpl())->getAllPrograms();
        LayoutRendering::basicLayout($contentView);
    }

    /**
     * @throws \http\HTTPException
     */
    public static function edit(){

        $id = $_GET["id"];
        $contentView = new TemplateView("programEdit.php");
        $contentView->program = (new ProgramServiceImpl())->readProgram(1);
        echo "<script>alert('Test".$_GET["id"] ."');</script>";
        echo print_r($contentView->program);
        return;
        LayoutRendering::basicLayout($contentView);
    }

    /**
     * @return bool
     * @throws \http\HTTPException
     */
    public static function update(){
        $program = new Program();
        $program->setId($_POST["id"]);
        $program->setName($_POST["name"]);
        $program->setType($_POST["type"]);
        $program->setCategoryId($_POST["category_id"]);
        $program->setDistanceLearning(["distance_learning"]);
        $program->setDegree($_POST["degree"]);
        $program->setPrice($_POST["price"]);
        $program->setDuration($_POST["duration"]);
        $program->setDescription($_POST["description"]);
        $program->setRequirement($_POST["requirements"]);
        $program->setUrl($_POST["url"]);
        $program->setExpiration($_POST["expiration"]);
        $program->setProviderId($_POST["provider_id)"]);
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

    public function getAllPrograms() {
        if(AuthServiceImpl::getInstance()->verifyAuth()){
            $programDAO = new ProgramDAO();
            return $programDAO->getAllPrograms();
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    public static function delete(){
        $id = $_GET["id"];
        (new ProgramServiceImpl())->deleteProgram($id);
    }

}