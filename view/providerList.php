<?php
/**
 * Created by PhpStorm.
 * User: timothyapplewhite
 * Date: 13.11.18
 * Time: 17:39
 */

use view\TemplateView;
use domain\Provider;
isset($this->provider) ? $provider = $this->provider : $provider = new Provider();

?>
<div class="col-sm-10 text-left blue-background">
    <div class="form-clean">
        <form method="post">
            <h2 class="text-center">Available Providers</h2>
            <div class="form-group"><input id="search" class="form-control" type="search" onkeyup="searchProvider()" placeholder="Search"></div>
            <div class="text">
                <div class="table-responsive table table-striped table-bordered table-hover">
                    <table class="table" id="user">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Billing email</th>
                            <th>Administrator</th>
                            <?php if(isset($_SESSION['userLogin'])): ?><th>Action</th><?php endif; ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($this->providers as $provider): /* @var Provider $provider */ ?>
                            <tr class='clickable-row' data-href="/provider?id=<?php echo $provider->getId(); ?>">
                                <td><?php echo TemplateView::noHTML($provider->getName()); ?></td>
                                <td><?php echo TemplateView::noHTML($provider->getDescription()); ?></td>
                                <td><?php echo TemplateView::noHTML($provider->getBillingEmail()); ?></td>
                                <td><?php echo TemplateView::noHTML($provider->getAdministratorEmail()); ?></td>
                                <?php if(isset($_SESSION['userLogin'])): ?>
                                    <td>
                                    <?php if($_SESSION["userLogin"]["siteAdmin"] == true || ($provider->getAdministrator() == $_SESSION["userLogin"]["userID"])): ?>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a class="btn-default" role="button" href="/provider/edit?id=<?php echo $provider->getId(); ?>"> <ion-icon name="create"></ion-icon></a>
                                            <a class="btn-default" role="button" href="/provider/delete?id=<?php echo $provider->getId(); ?>"> <ion-icon name="trash"></ion-icon></a>
                                        </div>
                                    <?php endif; ?>
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
    function searchProvider() {
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
            rowContent = td[0].innerHTML + td[1].innerHTML + td[2].innerHTML + td[3].innerHTML;
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
</script>