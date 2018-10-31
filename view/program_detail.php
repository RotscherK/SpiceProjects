<?php

use view\TemplateView;
use controller\PDFController;
use domain\Program;

isset($this->program) ? $program = $this->program : $program = new Program();
?>

<div class="col-sm-10 text-left blue-background">
    <div class="form-clean">
        <div class="row details-form">
            <div></div>
            <h1><?php echo TemplateView::noHTML($program->getName()) ?></h1>
            <div></div>
        </div>
        <div class="row details-form">
            <div class="container container-details"><label><strong>Details</strong><br></label>
                <div class="row">
                    <div class="col"><label>Category<br></label></div>
                    <div class="col"><label><?php echo TemplateView::noHTML($program->getCategoryId()) ?><br></label></div>
                </div>
                <div class="row">
                    <div class="col"><label>Type<br></label></div>
                    <div class="col"><label><?php echo TemplateView::noHTML($program->getType()) ?><br></label></div>
                </div>
                <div class="row">
                    <div class="col"><label>Degree<br></label></div>
                    <div class="col"><label><?php echo TemplateView::noHTML($program->getDegree()) ?><br></label></div>
                </div>
                <div class="row">
                    <div class="col"><label>Price<br></label></div>
                    <div class="col"><label>CHF <?php echo TemplateView::noHTML($program->getPrice()) ?><br></label></div>
                </div>

                <div class="row">
                    <div class="col"><label>Duration<br></label></div>
                    <div class="col"><label><?php echo TemplateView::noHTML($program->getDuration()) ?><br></label></div>
                </div>
                <div class="row">
                    <div class="col"><label>Expiration<br></label></div>
                    <div class="col"><label><?php echo TemplateView::noHTML($program->getExpiration()) ?><br></label></div>
                </div>
            </div>
        </div>
        <div class="row details-form">
            <div class="container-fluide"><label><strong>Description</strong></label>
                <p><?php echo TemplateView::noHTML($program->getDescription()) ?></p>
            </div>
        </div>
        <div class="row details-form">
            <div class="container-fluide"><label><strong>Requirements</strong></label>
                <p><?php echo TemplateView::noHTML($program->getRequirement()) ?></p>
            </div>
        </div>
        <div class="row details-form">
            <div class="container container-details"><label><strong>Provider <?php echo TemplateView::noHTML($program->getProviderId()) ?></strong><br></label>
                <div class="row">
                    <div class="col"><label>Place<br></label></div>
                    <div class="col"><label>Text<br></label></div>
                </div>
                <div class="row">
                    <div class="col"><label>Price<br></label></div>
                    <div class="col"><label>Text<br></label></div>
                </div>
            </div>
        </div>

        <div class="row details-form">
            <div class="container container-details"><label><strong>Actions</strong><br /></label>
                <div id="actiondetail" class="row">
                    <div class="container container-details">
                        <div class="col"><button class="btn btn-secondary btn-block" onclick="location.href='program/edit?id=<?php echo $program->getId(); ?>'" type="button">Edit</button></div>
                        <div class="col"><button class="btn btn-secondary btn-block" onclick="location.href='program/delete?id=<?php echo $program->getId(); ?>'" type="button">Delete</button></div>
                    </div>
                </div>
            </div>
        </div>

        <?php if(isset($_SESSION['userLogin'])): ?>
            <div class="row details-form">
                <div class="container container-details"><label><strong>Actions</strong><br /></label>
                    <div id="actiondetail">
                        <div class="container container-details"><button class="btn btn-secondary btn-block" onclick="location.href='program/edit?id=<?php echo $program->getId(); ?>'" type="button">Edit</button><button class="btn btn-secondary btn-block" onclick="location.href='http://www.example.com'"program/delete?id=<?php echo $program->getId(); ?>'" type="button">Delete</button></div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>