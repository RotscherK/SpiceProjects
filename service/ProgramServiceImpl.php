<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 22.10.2018
 * Time: 22:09
 */

namespace service;

use domain\Program;
use dao\ProgramDAO;
use http\HTTPException;
use http\HTTPStatusCode;

class ProgramServiceImpl implements ProgramService
{
    /**
     * @access public
     * @param Program couse
     * @return Program
     * @ParamType program Program
     * @ReturnType Program
     * @throws HTTPException
     */
    public function createProgram(Program $program) {
        $programDAO = new ProgramDAO();
        return $programDAO->create($program);

    }

    /**
     * @access public
     * @param int couresId
     * @return $program
     * @ParamType programId int
     * @ReturnType $program
     * @throws HTTPException
     */
    public function readProgram($programId) {
        $programDAO = new programDAO();
        return $programDAO->read($programId);
    }

    /**
     * @access public
     * @param Program program
     * @return Program
     * @ParamType program Program
     * @ReturnType Program
     * @throws HTTPException
     */
    public function updateProgram(Program $program) {
        //if(AuthServiceImpl::getInstance()->verifyAuth()) {
            $programDAO = new ProgramDAO();
            return $programDAO->update($program);
        //}
        //throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    /**
     * @access public
     * @param int programId
     * @ParamType programId int
     */
    public function deleteProgram($programId) {
        $programDAO = new ProgramDAO();
        $program = new Program();
        $program->setId($programId);
        $programDAO->delete($program);

    }

    /**
     * @access public
     * @return Program[]
     * @ReturnType Program[]
     * @throws HTTPException
     */
    public function getAllPrograms() {
        $programDAO = new ProgramDAO();
        return $programDAO->getAllPrograms();
    }

    public function getProgramById($programId) {
        $programDAO = new ProgramDAO();
        return $programDAO->getProgramById($programId);
    }
}