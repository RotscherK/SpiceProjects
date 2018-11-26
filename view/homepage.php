<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 25.10.2018
 * Time: 18:00
 */

use view\TemplateView;
use domain\Program;
isset($this->program) ? $program = $this->program : $program = new Program();

?>
<div class="col-sm-10 text-left blue-background">
    <div class="form-clean">
        <form method="post">
            <h2 class="text-center">Available Programs</h2>
            <div class="form-group"><input id="search" class="form-control" type="search" onkeyup="searchProgram()" placeholder="Search"></div>
            <div class="text">
                <div class="table-responsive table table-striped table-bordered table-hover">
                    <table class="table" id="program">
                        <thead>
                        <tr>
                            <th>Program</th>
                            <th>University</th>
                            <th>Place</th>
                            <th>Degree</th>
                            <th>Type</th>
                            <th>Duration</th>
                            <?php if(isset($_SESSION['userLogin'])): ?><th>Action</th><?php endif; ?>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($this->programs as $program): /* @var Program $program */ ?>
                            <tr class='clickable-row' data-href="/program?id=<?php echo $program->getId(); ?>">
                                <td><?php echo TemplateView::noHTML($program->getName()); ?></td>
                                <td><?php echo TemplateView::noHTML($program->getProvider()->getName()); ?></td>
                                <td><?php echo TemplateView::noHTML($program->getProvider()->getStreet() . " " . $program->getProvider()->getPlz() ." " . $program->getProvider()->getCity()) ?></td>
                                <td><?php echo TemplateView::noHTML($program->getDegree()); ?> </td>
                                <td><?php
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
                                    ?></td>
                                <td><?php echo TemplateView::noHTML($program->getDuration()); ?> </td>
                                <?php if(isset($_SESSION['userLogin'])): ?>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a class="btn-default" role="button" href="program/edit?id=<?php echo $program->getId(); ?>"> <ion-icon name="create"></ion-icon></a>
                                            <a class="btn-default" role="button" href="program/delete?id=<?php echo $program->getId(); ?>"> <ion-icon name="trash"></ion-icon></a>
                                        </div>
                                    </td>
                                <?php endif; ?>
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
        var input, filter, keywords, found, table, tbody, tr, td, i, rowContent;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        keywords = filter.split(" ");
        table = document.getElementById("program");
        tbody = document.getElementsByTagName("tbody")[0];
        tr = tbody.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            rowContent = td[0].innerHTML + td[1].innerHTML + td[2].innerHTML + td[3].innerHTML + td[4].innerHTML + td[5].innerHTML;
            if (td) {
                found = false;
                for(var j=0; j < keywords.length || found; j++) {
                    if (rowContent.toUpperCase().indexOf(keywords[j]) > -1) {
                        found = true;
                    }
                }
                if (found) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    window.onload = function(){
        $('*[data-href]').on('click', function() {
            window.location = $(this).data("href");
        });
    };

</script>