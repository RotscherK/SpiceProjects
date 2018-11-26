<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 22.10.2018
 * Time: 21:48
 */

namespace controller;

use dao\UserDAO;
use domain\Program;
use domain\User;
use domain\Provider;
use service\CategoryServiceImpl;
use service\EmailServiceClient;
use service\ProviderServiceImpl;
use service\UserServiceImpl;
use validator\ProgramValidator;
use service\ProgramServiceImpl;
use dao\ProgramDAO;
use view\TemplateView;
use view\LayoutRendering;
use \Datetime;
use http\HTTPException;
use http\HTTPStatusCode;

class ProgramController
{
    public static function create(){
        $contentView = new TemplateView("programEdit.php");
        $contentView->providers = (new ProviderServiceImpl())->getAllProviders();
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
        $contentView->program = (new ProgramServiceImpl())->readProgram($id);
        $contentView->categories = (new CategoryServiceImpl())->getAllCategories();
        $contentView->providers = (new ProviderServiceImpl())->getAllProviders();
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
        $program->setCategoryId($_POST["category"]);
        $program->setDistanceLearning(["distance_learning"]);
        $program->setDegree($_POST["degree"]);
        $program->setPrice($_POST["price"]);
        $program->setDuration($_POST["duration"]);
        $program->setDescription($_POST["description"]);
        $program->setRequirement($_POST["requirement"]);
        $program->setUrl($_POST["url"]);
        $program->setStartDate($_POST["startDate"]);
        $program->setProviderId($_POST["provider"]);
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
            $contentView->categories = (new CategoryServiceImpl())->getAllCategories();
            $contentView->providers = (new ProviderServiceImpl())->getAllProviders();
            $contentView->programValidator = $programValidator;
            LayoutRendering::basicLayout($contentView);
            return false;
        }
        return true;
    }

    public function getAllPrograms() {
        $programDAO = new ProgramDAO();
        return $programDAO->getAllPrograms();

    }

    public static function showDetails()
    {
        $id = $_GET["id"];
        $contentView = new TemplateView("view/programDetail.php");
        $contentView->program = (new ProgramServiceImpl())->readProgram($id);
        LayoutRendering::basicLayout($contentView);
    }

    public static function delete(){
        $id = $_GET["id"];
        (new ProgramServiceImpl())->deleteProgram($id);
    }

    public static function  expirationNotification(){
        $programService = new ProgramServiceImpl();
        $allPrograms = $programService->getAllPrograms();
        $expiredPrograms = array_filter($allPrograms, function(Program $program){
            if ($program->getStartDate()==(new DateTime())->format('Y-m-d')){
                return true;
            }
            return false;
        });
        echo " || " . count($expiredPrograms). " expired";

        foreach($expiredPrograms as $program){
            $provider = (new ProviderServiceImpl())->readProvider($program->getProviderId());
            self::sendExpirationNotification($program, $provider, (new UserServiceImpl())->readUserBasic($provider->getAdministrator()));
        }

    }
    public static function  sendExpirationNotification(Program $program, Provider $provider, User $admin){
        $emailView = new TemplateView("view/programExpirationEmail.php");
        $emailView->program = $program;
        $emailView->provider = $provider;
        $emailView->firstname = $admin->getFirstname();
        return EmailServiceClient::sendEmail($admin->getEmail(), "Program is expired", $emailView->render(), false, null, null);

    }


}