<?php
use view\TemplateView;
use domain\Advertisement;
use service\AdvertisementServiceImpl;

isset($this->advertisement) ? $advertisement = $this->advertisement : $advertisement = new advertisement();
$advertisements = (new AdvertisementServiceImpl())->getAllAdvertisements();
?>

<div class="col-sm-2 sidenav">
    <div class="well">
       <?php
        shuffle($advertisements);
        array_splice($advertisements,4);
        foreach($advertisements as $advertisement): /* @var Advertisement $advertisement */ ?>
        <?php $link = $advertisement->getURL();?>
        <?php echo "<p><a href='$link'>";?>
            <?php echo TemplateView::noHTML($advertisement->getTitle()); ?>
            <?php echo "</a></p>"?>
            <?php echo "<p>"?>
            <img src="<?php echo TemplateView::noHTML($advertisement->getImage()); ?>" alt="Ad Img" class="responsive">
            <?php echo TemplateView::noHTML($advertisement->getContent()); ?>
            <?php echo "<p> <hr />"?>
        <?php endforeach ?>
        <?php ; ?>
    </div>
</div>
</div>
</div>
</div>
</div>
<div class="footer-dark">
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3 item">
                    <h3>Services</h3>
                    <ul>
                        <li><a href="#">Web design</a></li>
                        <li><a href="https://github.com/">Development</a></li>
                        <li><a href="https://dashboard.heroku.com">Hosting</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-3 item">
                    <h3>About</h3>
                    <ul>
                        <li><a href="#">Company</a></li>
                        <li><a href="#">Team</a></li>
                    </ul>
                </div>
                <div class="col-md-6 item text">
                    <h3>Spice Projects</h3>
                    <p>The Company Spice Projects is a design and development studio based in Basel. It was founded with a simple, powerful idea: lets make everything spicy.</p>
                </div>
                <div class="col item social"><a href="https://www.facebook.com/"><i class="icon ion-social-facebook"></i></a><a href="https://twitter.com/"><i class="icon ion-social-twitter"></i></a><a href="https://www.snapchat.com"><i class="icon ion-social-snapchat"></i></a><a href="https://www.instagram.com"><i class="icon ion-social-instagram"></i></a></div>
            </div>
            <p class="copyright">Spice Projects © 2018</p>
        </div>
    </footer>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>