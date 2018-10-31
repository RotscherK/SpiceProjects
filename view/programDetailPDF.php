<?php
use view\TemplateView;
use domain\Program;

isset($this->program) ? $program = $this->program : $program = new Program();
?>

<h1 align="center" style="font-family: Helvetica;"><span style="color: #f4476b;">Spice Projects</span> | Program Details</h1>
<br>
<table border="0" style="height: 237px; border-color: #f4476b; border-collapse: collapse; width: 463.5px; margin-left: auto; margin-right: auto; font-size: 20px;" >
    <tbody>
    <tr style="height: 30px; border-top: 1px solid rgb(244,71,107);">
        <td style="width: 186px; padding-left: 10px; font-family: Helvetica; font-weight: bold;">Name</td>
        <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;"><?php echo TemplateView::noHTML($program->getName()); ?></td>
    </tr>
    <tr style="height: 30px; border-top: 1px solid rgb(244,71,107)">
        <td style="width: 186px; padding-left: 10px; font-family: Helvetica; font-weight: bold;">Category</td>
        <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;"><?php echo TemplateView::noHTML($program->getCategoryId()); ?></td>
    </tr>
    <tr style="height: 30px; border-top: 1px solid rgb(244,71,107)">
        <td style="width: 186px; padding-left: 10px; font-family: Helvetica; font-weight: bold;">Type</td>
        <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;"><?php echo TemplateView::noHTML($program->getType()); ?></td>
    </tr>
    <tr style="height: 30px; border-top: 1px solid rgb(244,71,107)">
        <td style="width: 186px; padding-left: 10px; font-family: Helvetica; font-weight: bold;">Degree</td>
        <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;"><?php echo TemplateView::noHTML($program->getDegree()); ?></td>
    </tr>
    <tr style="height: 30px; border-top: 1px solid rgb(244,71,107)">
        <td style="width: 186px; padding-left: 10px; font-family: Helvetica; font-weight: bold;">Price</td>
        <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;"><?php echo TemplateView::noHTML($program->getPrice()); ?> m<sup>2</sup></td>
    </tr>
    <tr style="height: 30px; border-top: 1px solid rgb(244,71,107)">
        <td style="width: 186px; padding-left: 10px; font-family: Helvetica; font-weight: bold;">Duration</td>
        <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;"><?php echo TemplateView::noHTML($program->getDuration()); ?></td>
    </tr>
    <tr style="height: 30px; border-top: 1px solid rgb(244,71,107);">
        <td style="width: 186px; padding-left: 10px; font-family: Helvetica; font-weight: bold;">Description</td>
        <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;"><?php echo TemplateView::noHTML($program->getDescription()); ?></td>
    </tr>
    <tr style="height: 30px; border-top: 1px solid rgb(244,71,107); border-bottom: 1px solid rgb(244,71,107)">
        <td style="width: 186px; padding-left: 10px; font-family: Helvetica; font-weight: bold;">Requirements</td>
        <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;"><?php echo TemplateView::noHTML($program->getRequirement()); ?></td>
    </tr>
    </tbody>
</table>