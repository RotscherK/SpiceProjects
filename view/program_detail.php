<?php

use view\TemplateView;
use controller\PDFController;

$program = $this->program

?>

<main class="content">
    <div class="listing-detail-grid">

        <div class="details-area">
            <div class="listing-item">
                <div class="listing-info">
                    <h2><?php echo TemplateView::noHTML($listing->getTitle()) ?></h2>
                    <h3><?php echo TemplateView::noHTML($listing->getStreet() . " " . $listing->getStreetNumber() .  ", " . (isset($street) ? $listing->getCity() : $listing->getCity())) ?></h3>
                    <p>
                        <?php echo TemplateView::noHTML($listing->getDescription()); ?>
                    </p>
                    <div class="listing-details">
                        <ul>
                            <li><?php echo "Rent: " . TemplateView::noHTML($listing->getPrice() . " CHF") ?></li>
                            <li><?php echo "Size: " . TemplateView::noHTML($listing->getSquaremeters()) ?>
                                &nbsp;m<sup>2</sup></li>
                            <li><?php echo "Rooms: " . TemplateView::noHTML($listing->getNumberofrooms()) ?></li>
                            <li><?php echo "Available From: " . TemplateView::noHTML($listing->getMoveindate()) ?></li>
                        </ul>
                    </div>
                </div>
                <div class="options">
                    <a href='<?php echo $GLOBALS["ROOT_URL"]; ?>/pdf/<?php echo $listing->getId(); ?>'>
                        <i class="far fa-file-pdf"></i>PDF</a>
                </div>
            </div>
        </div>
        <div class="contact-area">
            <div class="contact-form">
                <div class="form-layout contact">
                    <form class="entry-form contact" method="post" action="<?php echo $GLOBALS["ROOT_URL"]; ?>/listing/emailContact/">
                        <h1>Contact the advertiser</h1>

                        <input hidden type="text" name="listingID" value="<?php echo TemplateView::noHTML($listing->getId()); ?>" />
                        <input hidden type="text" name="userID" value="<?php echo TemplateView::noHTML($listing->getUserid()); ?>" />

                        <div class="form-group">
                            <input type="text" required name="firstName"/>
                            <label>First Name</label>
                        </div>
                        <div class="form-group">
                            <input type="text" required name="lastName"/>
                            <label>Last Name</label>
                        </div>
                        <div class="form-group">
                            <input type="text" required name="email"/>
                            <label>E-mail</label>
                        </div>
                        <div class="form-group">
                            <textarea cols="40" rows="5" required name="message"></textarea>
                            <label class="label-top">Message</label>
                        </div>
                        <input type="button" class="green" onclick="form.submit()" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
        <div class="map-area" id="map">
            <iframe width="100%" height="100%" frameborder='0'
                    scrolling='no' marginheight='0' marginwidth='0'
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCc6umJix_atnmSnjG4S5S6rj4WP492C3Y&amp;q=<?php echo $listing->getStreet() . "+" . $listing->getStreetNumber() . "+" . $listing->getCity() ?>+Switzerland&amp;zoom=15">

                <!--src='https://maps.google.com/maps?&amp;q="an der hohlen gasse 6"&amp;output=embed'>-->

            </iframe>
        </div>
    </div>
</main>