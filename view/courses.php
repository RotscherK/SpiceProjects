<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 20.10.2018
 * Time: 22:59
 */
use view\TemplateView;
?>
<div class="container">
    <div class="page-header">
        <h2 class="text-center">All <strong>courses</strong>.</h2></div>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>ID </th>
                <th>Name </th>
                <th>Description </th>
                <th>Price </th>
                <th>Requirements </th>
                <th>University </th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($this->course as $course): /* @var Course $course */ ?>
            <tr>
                <td><?php echo $course->getId(); ?> </td>
                <td><?php echo TemplateView::noHTML($course->getName()); ?></td>
                <td><?php echo TemplateView::noHTML($course->getDescription()); ?> </td>
                <td><?php echo TemplateView::noHTML($course->getPrice()); ?> </td>
                <td><?php echo TemplateView::noHTML($course->getExpirationDate()); ?> </td>
                <td><?php echo TemplateView::noHTML($course->getRequirement()); ?> </td>
                <td><?php echo TemplateView::noHTML($course->getUniversityId()); ?> </td>
                <td>
                    <div class="btn-group btn-group-sm" role="group">
                        <a class="btn btn-default" role="button" href="course/edit?id=<?php echo $course->getId(); ?>"> <i class="fa fa-edit"></i></a>
                        <button class="btn btn-default" type="button" data-target="#confirm-modal" data-toggle="modal" data-href="course/delete?id=<?php echo $course->getId(); ?>"> <i class="glyphicon glyphicon-trash"></i></button>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="btn-group" role="group">
        <a class="btn btn-default" role="button" href="course/create"> <i class="fa fa-plus-square-o"></i></a>
        <a target="_blank" class="btn btn-default" role="button" href="customer/pdf"> <i class="fa fa-file-pdf-o"></i></a>
        <a class="btn btn-default" role="button" href="course/email"> <i class="fa fa-envelope-o"></i></a>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="confirm-modal">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Deletion of a <strong>course</strong>.</h4></div>
                <div class="modal-body">
                    <p>Do you want to delete a course?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" type="button" data-dismiss="modal">Cancel </button><a class="btn btn-primary" role="button" href="#">Delete </a></div>
            </div>
        </div>
    </div>
</div>