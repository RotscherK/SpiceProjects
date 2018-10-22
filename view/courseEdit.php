<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.09.2017
 * Time: 17:06
 */
use view\TemplateView;
use domain\Course;
use validator\CourseValidator;

isset($this->course) ? $course = $this->course : $course = new Course();
isset($this->courseValidator) ? $courseValidator = $this->courseValidator : $courseValidator = new CourseValidator();
?>
<div class="container">
    <div class="page-header">
        <h2 class="text-center">A <strong>course</strong>. </h2></div>
    <form action="update" method="post">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>ID </span></div>
                <input class="form-control" type="text" name="id" readonly="" value="<?php echo $course->getId() ?>">
            </div>
        </div>
        <div class="form-group <?php echo $courseValidator->isNameError() ? "has-error" : ""; ?>">
            <div class="input-group">
                <div class="input-group-addon"><span>Name </span></div>
                <input class="form-control" type="text" name="name" value="<?php echo TemplateView::noHTML($course->getName()) ?>">
            </div>
            <p class="help-block"><?php echo $courseValidator->getNameError() ?></p>
        </div>
        <div class="form-group <?php echo $courseValidator->isDescriptionError() ? "has-error" : ""; ?>">
            <div class="input-group">
                <div class="input-group-addon"><span>Description </span></div>
                <input class="form-control" type="text" name="description" value="<?php echo TemplateView::noHTML($course->getDescription()) ?>">
            </div>
            <p class="help-block"><?php echo $courseValidator->getDescriptionError() ?></p>
        </div>
        <div class="form-group <?php echo $courseValidator->isPriceError() ? "has-error" : ""; ?>">
            <div class="input-group">
                <div class="input-group-addon"><span>Price </span></div>
                <input class="form-control" type="currency" name="price" value="<?php echo TemplateView::noHTML($course->getPrice()) ?>">
            </div>
            <p class="help-block"><?php echo $courseValidator->getPriceError() ?></p>
        </div>

        <div class="form-group <?php echo $courseValidator->isExpirationDateError() ? "has-error" : ""; ?>">
            <div class="input-group">
                <div class="input-group-addon"><span>Expiration Date </span></div>
                <input class="form-control" type="date" name="expiration_date" value="<?php echo TemplateView::noHTML($course->getExpirationDate()) ?>">
            </div>
            <p class="help-block"><?php echo $courseValidator->getExpirationDateError() ?></p>
        </div>

        <div class="form-group <?php echo $courseValidator->isReqirementError() ? "has-error" : ""; ?>">
            <div class="input-group">
                <div class="input-group-addon"><span>Requirement </span></div>
                <input class="form-control" type="currency" name="price" value="<?php echo TemplateView::noHTML($course->getRequirement()) ?>">
            </div>
            <p class="help-block"><?php echo $courseValidator->isReqirementError() ?></p>
        </div>

        <div class="form-group <?php echo $courseValidator->isUniversityIDError() ? "has-error" : ""; ?>">
            <div class="input-group">
                <div class="input-group-addon"><span>University </span></div>
                <input class="form-control" type= name="University" value="<?php echo TemplateView::noHTML($course->getUniversityId()) ?>">
            </div>
            <p class="help-block"><?php echo $courseValidator->getUniversityIDError() ?></p>
        </div>
        <div class="btn-group" role="group">
            <button class="btn btn-default" type="submit"> <i class="fa fa-save"></i></button>
        </div>
    </form>
</div>
