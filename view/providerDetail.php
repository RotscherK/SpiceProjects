<?php

use view\TemplateView;
use domain\Provider;

isset($this->provider) ? $provider = $this->provider : $provider = new Provider();
?>

<div class="col-sm-10 text-left blue-background">
    <div class="form-clean">
        <div class="row details-form">
            <div></div>
            <h1><?php echo TemplateView::noHTML($provider->getName()) ?></h1>
            <div></div>
        </div>
        <div class="row details-form">
            <div class="container container-details"><label><strong>Details</strong><br></label>
                <div class="row">
                    <div class="col"><label>Name<br></label></div>
                    <div class="col"><label><?php echo TemplateView::noHTML($provider->getName()) ?><br></label></div>
                </div>
                <div class="row">
                    <div class="col"><label>Description<br></label></div>
                    <div class="col"><label><?php echo TemplateView::noHTML($provider->getDescription()) ?><br></label></div>
                </div>
                <div class="row">
                    <div class="col"><label>PLZ<br></label></div>
                    <div class="col"><label><?php echo TemplateView::noHTML($provider->getPlz()) ?><br></label></div>
                </div>
                <div class="row">
                    <div class="col"><label>City<br></label></div>
                    <div class="col"><label><?php echo TemplateView::noHTML($provider->getCity()) ?><br></label></div>
                </div>
                <div class="row">
                    <div class="col"><label>Street<br></label></div>
                    <div class="col"><label><?php echo TemplateView::noHTML($provider->getStreet()) ?><br></label></div>
                </div>
                <div class="row">
                    <div class="col"><label>Billing email<br></label></div>
                    <div class="col"><label><?php echo TemplateView::noHTML($provider->getBillingEmail()) ?><br></label></div>
                </div>
                <div class="row">
                    <div class="col"><label>Administrator<br></label></div>
                    <div class="col"><label>To be added<br></label></div>
                </div>
            </div>
        </div>
    </div>
</div>