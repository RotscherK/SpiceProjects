<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 25.10.2018
 * Time: 18:00
 */
use view\TemplateView;
?>
<div class="col-sm-10 text-left">
    <div class="form-clean">
        <form method="post">
            <h2 class="text-center">Available Programs</h2>
            <div class="form-group"><input id="search" class="form-control" type="search" onkeyup="searchProgram()" placeholder="Search"></div>
            <div class="text">
                <div class="table-responsive table table-striped table-bordered table-hover">
                    <table class="table" id="program">
                        <thead>
                        <tr>
                            <th>Programm</th>
                            <th>University</th>
                            <th>Place</th>
                            <th>Degree</th>
                            <th>Type</th>
                            <th>Duration</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($this->programs as $program): /* @var Program $program */ ?>
                            <tr>
                                <td><?php echo TemplateView::noHTML($program->getName()); ?></td>
                                <td><?php echo TemplateView::noHTML($program->getProviderId()); ?></td>
                                <td><?php echo TemplateView::noHTML($program->getProviderId()); ?> </td>
                                <td><?php echo TemplateView::noHTML($program->getDegree()); ?> </td>
                                <td><?php echo TemplateView::noHTML($program->getType()); ?> </td>
                                <td><?php echo TemplateView::noHTML($program->getDuration()); ?> </td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a class="btn-default" role="button" href="program/edit?id=<?php echo $program->getId(); ?>"> <i class="fa fa-edit"></i></a>
                                        <button class="btn-default" type="button" data-target="#confirm-modal" data-toggle="modal" data-href="program/delete?id=<?php echo $program->getId(); ?>"> <ion-icon name="trash"></ion-icon></button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
                <p></p>
            </div>
        </form>
    </div>
</div>

