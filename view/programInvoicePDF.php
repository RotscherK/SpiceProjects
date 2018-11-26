<?php
use view\TemplateView;
use domain\Program;

?>

<h1 align="center" style="font-family: Helvetica;"><span style="color: #f4476b;">Spice Projects</span> | Program Details</h1>
<br>
<table border="0" style="height: 237px; border-color: #f4476b; border-collapse: collapse; width: 463.5px; margin-left: auto; margin-right: auto; font-size: 20px;" >
    <thead>
    <tr>
        <td style="width: 186px; padding-left: 10px; font-family: Helvetica; font-weight: bold;">Name</td>
        <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;">Degree</td>
        <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;">Duration</td>
        <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;">Expiration Date</td>
        <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;">Cost</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($this->billingPrograms as $program): /* @var Program $program */ ?>
        <tr>
            <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;"><?php echo TemplateView::noHTML($program->getName()); ?></td>
            <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;"><?php echo TemplateView::noHTML($program->getDegree()); ?> </td>
            <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;"><?php echo TemplateView::noHTML($program->getDuration()); ?> </td>
            <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;"><?php echo TemplateView::noHTML($program->getStartDate()); ?> </td>
            <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;">1.- CHF</td>
        </tr>
    <?php endforeach; ?>
    <tr class='clickable-row' data-href="/program?id=<?php echo $program->getId(); ?>">
        <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;"></td>
        <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;"></td>
        <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;"></td>
        <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;"></td>
        <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;">Total</td>
        <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;"><?php echo sizeof($this->billingPrograms); ?> CHF</td>

    </tr>
    </tbody>
</table>