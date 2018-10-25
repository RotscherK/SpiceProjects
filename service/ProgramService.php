<?php
/**
 * Created by PhpStorm.
 * Program: roger.kaufmann
 * Date: 25.10.2018
 * Time: 10:08
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
     * @ParamType program Program
     * @ReturnType Program
     */
    public function createProgram(Program $program);

    /**
     * @access public
     * @param int programId
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
    public function findAllProgram();
}