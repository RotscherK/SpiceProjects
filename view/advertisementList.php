<?php
/**
 * Created by PhpStorm.
 * User: timothyapplewhite
 * Date: 01.11.18
 * Time: 17:44
 */

use view\TemplateView;
use domain\Advertisement;
isset($this->advertisement) ? $advertisement = $this->advertisement : $advertisement = new advertisement();

?>
<div class="col-sm-10 text-left blue-background">
    <div class="form-clean">
        <form method="post">
            <h2 class="text-center">Available Advertisements</h2>
            <div class="form-group"><input id="search" class="form-control" type="search" onkeyup="searchAD()" placeholder="Search"></div>
            <div class="text">
                <div class="table-responsive table table-striped table-bordered table-hover">
                    <table class="table" id="user">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>URL</th>
                            <th>Administrator</th>
                            <?php if(isset($_SESSION['userLogin'])): ?><th>Action</th><?php endif; ?>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($this->advertisement as $advertisement): /* @var Advertisement $advertisement */ ?>
                            <tr class='clickable-row' data-href="/advertisement?id=<?php echo $advertisement->getId(); ?>">
                                <td><?php echo TemplateView::noHTML($advertisement->getTitle()); ?></td>
                                <td><?php echo TemplateView::noHTML($advertisement->getContent()); ?></td>
                                <td><?php echo TemplateView::noHTML($advertisement->getURL()); ?></td>
                                <td><?php echo TemplateView::noHTML($advertisement->getUserAdmin()); ?></td>
                                <?php if(isset($_SESSION['userLogin'])): ?>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a class="btn-default" role="button" href="/advertisement/edit?id=<?php echo $advertisement->getId(); ?>"> <ion-icon name="create"></ion-icon></a>
                                            <a class="btn-default" role="button" href="/advertisement/delete?id=<?php echo $advertisement->getId(); ?>"> <ion-icon name="trash"></ion-icon></a>
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
    /**function searchUser() {
        // Declare variables
        var input, filter, table, tbody, tr, td, i, rowContent;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        table = document.getElementById("user");
        tbody = document.getElementsByTagName("tbody")[0];
        tr = tbody.getElementsByTagName("tr");
        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            rowContent = td[0].innerHTML + td[1].innerHTML + td[2].innerHTML;
            if (td) {
                if (rowContent.toUpperCase().indexOf(filter) > -1) {
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
    **/
</script>
