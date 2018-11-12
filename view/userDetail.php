<?php

use view\TemplateView;
use domain\User;

isset($this->user) ? $user = $this->user : $user = new User();
?>

<div class="col-sm-10 text-left blue-background">
    <div class="form-clean">
        <div class="row details-form">
            <div></div>
            <h1><?php echo TemplateView::noHTML($user->getEmail()) ?></h1>
            <div></div>
        </div>
        <div class="row details-form">
            <div class="container container-details"><label><strong>Details</strong><br></label>
                <div class="row">
                    <div class="col"><label>Last Name<br></label></div>
                    <div class="col"><label><?php echo TemplateView::noHTML($user->getLastname()) ?><br></label></div>
                </div>
                <div class="row">
                    <div class="col"><label>First Name<br></label></div>
                    <div class="col"><label><?php echo TemplateView::noHTML($user->getFirstname()) ?><br></label></div>
                </div>
                <div class="row">
                    <div class="col"><label>Email<br></label></div>
                    <div class="col"><label><?php echo TemplateView::noHTML($user->getEmail()) ?><br></label></div>
                </div>
                <div class="row">
                    <div class="col"><label>Type<br></label></div>
                    <div class="col"><label>to be added<br></label></div>
                </div>
            </div>
        </div>
    </div>
</div>