<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 22.10.2018
 * Time: 22:09
 */

namespace service;

use domain\Course;
use dao\CourseDAO;
use http\HTTPException;
use http\HTTPStatusCode;

class CourseServiceImpl implements CourseService
{
    /**
     * @access public
     * @param Course couse
     * @return Course
     * @ParamType course Course
     * @ReturnType Course
     * @throws HTTPException
     */
    public function createCourse(Course $course) {
        if(AuthServiceImpl::getInstance()->verifyAuth()) {
            $courseDAO = new CourseDAO();
            return $courseDAO->create($course);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    /**
     * @access public
     * @param int couresId
     * @return $course
     * @ParamType courseId int
     * @ReturnType $course
     * @throws HTTPException
     */
    public function readCourse($courseId) {
        if(AuthServiceImpl::getInstance()->verifyAuth()) {
            $courseDAO = new courseDAO();
            return $courseDAO->read($courseId);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    /**
     * @access public
     * @param Course course
     * @return Course
     * @ParamType course Course
     * @ReturnType Course
     * @throws HTTPException
     */
    public function updateCourse(Course $course) {
        if(AuthServiceImpl::getInstance()->verifyAuth()) {
            $courseDAO = new CourseDAO();
            return $courseDAO->update($course);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    /**
     * @access public
     * @param int courseId
     * @ParamType courseId int
     */
    public function deleteCourse($courseId) {
        if(AuthServiceImpl::getInstance()->verifyAuth()) {
            $courseDAO = new CourseDAO();
            $course = new Course();
            $course->setId($courseId);
            $courseDAO->delete($course);
        }
    }

    /**
     * @access public
     * @return Course[]
     * @ReturnType Course[]
     * @throws HTTPException
     */
    public function findAllCourses() {
        if(AuthServiceImpl::getInstance()->verifyAuth()){
            $courseDAO = new CourseDAO();
            return $courseDAO->getAllCourses();
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }
}