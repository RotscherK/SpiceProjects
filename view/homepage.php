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
                                        <a class="btn-default" role="button" href="program/edit?id=<?php echo $program->getId(); ?>"> <ion-icon name="create"></ion-icon></a>
                                        <a class="btn-default" type="button" data-href="program/delete?id=<?php echo $program->getId(); ?>"> <ion-icon name="trash"></ion-icon></a>
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

<script>
    function searchProgram() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        table = document.getElementById("program");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>