<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 22.10.2018
 * Time: 22:08
 */

namespace service;

use domain\Program;

/**
 * @access public
 * @author roger.kaufmann
 */
interface ProgramService {

    /**
     * @access public
     * @param Program program
     * @return Program
     * @ParamType customer program
     * @ReturnType Program
     */
    public function createProgram(Program $program);

    /**
     * @access public
     * @param int cprogramId
     * @return Program
     * @ParamType programId int
     * @ReturnType Program
     */
    public function readProgram($programId);

    /**
     * @access public
     * @param Program program
     * @return Program
     * @ParamType program Program
     * @ReturnType Program
     */
    public function updateProgram(Program $program);

    /**
     * @access public
     * @param int programId
     * @ParamType programId int
     */
    public function deleteProgram($programId);

    /**
     * @access public
     * @return Program[]
     * @ReturnType Program[]
     */
    public function findAllPrograms();
}