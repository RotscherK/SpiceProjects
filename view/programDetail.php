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
                    <div class="col"><label><?php echo TemplateView::noHTML($program->getCategory()->getName()) ?><br></label></div>
                </div>
                <div class="row">
                    <div class="col"><label>Type<br></label></div>
                    <div class="col"><label><?php
                            switch ($program->getType()) {
                                case 1:
                                    echo "Parttime";
                                    break;
                                case 2:
                                    echo "Fulltime";
                                    break;
                                case 3:
                                    echo "Parttime/Fulltime";
                                    break;
                            }
                            ?>

                            <br></label></div>
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
                    <div class="col"><label>Start Date<br></label></div>
                    <div class="col"><label><?php echo TemplateView::noHTML($program->getStartDate()) ?><br></label></div>
                </div>
            </div>
        </div>
        <div class="row details-form">
            <div class="container container-details"><label><strong>Actions</strong><br /></label>
                <div id="buttondetail" class="row">
                    <div class="col-sm-4"><button class="btn btn-secondary btn-block" onclick="location.href='<?php echo $program->getUrl(); ?>'" type="button">Link to provider</button></div>
                    <div class="col-sm-4"><button class="btn btn-secondary btn-block" onclick="Location.href='#request'" type="button">Request more info</button></div>
                    <div class="col-sm-4"><button class="btn btn-secondary btn-block" onclick="location.href='<?php echo $GLOBALS["ROOT_URL"]; ?>/program/pdf/<?php echo $program->getId(); ?>'" type="button">Generate PDF</button></div>
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
            <div class="container container-details"><label><strong>Provider <?php echo TemplateView::noHTML($program->getProvider()->getName()) ?></strong><br></label>
                <div class="row">
                    <div class="col"><label>Description<br></label></div>
                    <div class="col"><label><?php echo TemplateView::noHTML($program->getProvider()->getDescription()) ?><br></label></div>
                </div>
                <div class="row">
                    <div class="col"><label>Address<br></label></div>
                    <div class="col"><label><?php echo TemplateView::noHTML($program->getProvider()->getStreet()) ."<br>" . TemplateView::noHTML($program->getProvider()->getPlz() ." ". $program->getProvider()->getDescription()) ?></label></div>
                </div>
            </div>
        </div>

        <?php if(isset($_SESSION['userLogin'])): ?>
            <div class="row details-form">
                <div class="container container-details"><label><strong>Administration</strong><br /></label>
                    <div id="buttondetail" class="row">
                            <div class="col-sm-6"><button class="btn btn-secondary btn-block" onclick="location.href='program/edit?id=<?php echo $program->getId(); ?>'" type="button">Edit</button></div>
                            <div class="col-sm-6"><button class="btn btn-secondary btn-block" onclick="location.href='program/delete?id=<?php echo $program->getId(); ?>'" type="button">Delete</button></div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <p id="request"></p>
        <form action="program/request" method="post">
            <label><strong>Request more Information</strong><br /></label>
            <input hidden type="text" name="programid" value="<?php echo TemplateView::noHTML($program->getId()); ?>" />
            <div class="form-group row">
                <label for="id" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                </div>
            </div>
            <div class="form-group row">
                <label for="id" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <label for="id" class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                </div>
            </div>
            <div class="form-group row">
                <label for="id" class="col-sm-3 col-form-label">Comment</label>
                <div class="col-sm-9">
                    <textarea class="form-control" rows="20" id="comment" name="comment" placeholder="Comment"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6">
                    <button type="button" class="btn btn-secondary btn-block" name="cancel" value="Cancel" onClick="window.location='<?php echo $GLOBALS["ROOT_URL"]; ?>/';">Cancel</button>
                </div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary btn-block">Request</button>
                </div>

            </div>
        </form>
    </div>
</div>