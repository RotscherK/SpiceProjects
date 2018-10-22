<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 22.10.2018
 * Time: 21:48
 */

namespace controller;

use domain\Course;
use validator\CourseValidator;
use service\CourseServiceImpl;
use view\TemplateView;
use view\LayoutRendering;

class CourseController
{
    public static function create(){
        $contentView = new TemplateView("courseEdit.php");
        LayoutRendering::basicLayout($contentView);
    }

    public static function readAll(){
        $contentView = new TemplateView("courses.php");
        $contentView->courses = (new CourseServiceImpl())->findAllCourses();
        LayoutRendering::basicLayout($contentView);
    }

    public static function edit(){
        $id = $_GET["id"];
        $contentView = new TemplateView("coursesEdit.php");
        $contentView->course = (new CourseServiceImpl())->readCourse($id);
        LayoutRendering::basicLayout($contentView);
    }

    public static function update(){
        $course = new Course();
        $course->setId($_POST["id"]);
        $course->setName($_POST["name"]);
        $course->setDescription($_POST["description"]);
        $course->setPrice($_POST["price"]);
        $course->setExpirationDate($_POST["expiration_date"]);
        $course->setRequirement($_POST["requirement"]);
        $course->setUniversityId($_POST["university_id"]);
        $courseValidator = new CourseValidator($course);
        if($courseValidator->isValid()) {
            if ($course->getId() === "") {
                (new CourseServiceImpl())->createCourse($course);
            } else {
                (new CourseServiceImpl())->updateCourse($course);
            }
        }
        else{
            $contentView = new TemplateView("courseEdit.php");
            $contentView->course = $course;
            $contentView->courseValidator = $courseValidator;
            LayoutRendering::basicLayout($contentView);
            return false;
        }
        return true;
    }

    public static function delete(){
        $id = $_GET["id"];
        (new CourseServiceImpl())->deleteCourse($id);
    }

}