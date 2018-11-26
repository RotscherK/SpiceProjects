<?php
use view\TemplateView;
use domain\Program;

?>

<h1 align="center" style="font-family: Helvetica"><span style="color: #f4476b;">Spice Projects</span> | Monthly invoice</h1>
<br>
<table border="0" style="height: 237px; border-color: #f4476b; border-collapse: collapse; width: 463.5px; margin-left: auto; margin-right: auto; font-family: Helvetica; font-size: 12px;" >
    <thead>
    <tr>
        <td style=" padding-left: 10px;font-weight: bold;">Name</td>
        <td style=" padding-left: 10px;font-weight: bold;">Degree</td>
        <td style=" padding-left: 10px;font-weight: bold;">Duration</td>
        <td style=" padding-left: 10px;font-weight: bold;">Expiration Date</td>
        <td style=" padding-left: 10px;font-weight: bold;">Cost</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($this->billingPrograms as $program): /* @var Program $program */ ?>
        <tr>
            <td style="padding-left: 10px;"><?php echo TemplateView::noHTML($program->getName()); ?></td>
            <td style=" padding-left: 10px;"><?php echo TemplateView::noHTML($program->getDegree()); ?> </td>
            <td style=" padding-left: 10px;"><?php echo TemplateView::noHTML($program->getDuration()); ?> </td>
            <td style=" padding-left: 10px;"><?php echo TemplateView::noHTML($program->getStartDate()); ?> </td>
            <td style=" padding-left: 10px;">1.- CHF</td>
        </tr>
    <?php endforeach; ?>
    <tr class='clickable-row' data-href="/program?id=<?php echo $program->getId(); ?>">
        <td style=" padding-left: 10px;"></td>
        <td style=" padding-left: 10px;"></td>
        <td style=" padding-left: 10px;"></td>
        <td style=" padding-left: 10px; font-weight: bold;">Total</td>
        <td style=" padding-left: 10px; font-weight: bold;"><?php echo sizeof($this->billingPrograms); ?> CHF</td>

    </tr>
    </tbody>
</table>