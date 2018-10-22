<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 22.10.2018
 * Time: 22:08
 */

namespace service;

use domain\Course;

/**
 * @access public
 * @author roger.kaufmann
 */
interface CourseService {

    /**
     * @access public
     * @param Course course
     * @return Course
     * @ParamType customer course
     * @ReturnType Course
     */
    public function createCourse(Course $course);

    /**
     * @access public
     * @param int ccourseId
     * @return Course
     * @ParamType courseId int
     * @ReturnType Course
     */
    public function readCourse($courseId);

    /**
     * @access public
     * @param Course course
     * @return Course
     * @ParamType course Course
     * @ReturnType Course
     */
    public function updateCourse(Course $course);

    /**
     * @access public
     * @param int courseId
     * @ParamType courseId int
     */
    public function deleteCourse($courseId);

    /**
     * @access public
     * @return Course[]
     * @ReturnType Course[]
     */
    public function findAllCourses();
}