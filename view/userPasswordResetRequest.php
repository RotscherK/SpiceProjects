<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 31.10.2018
 * Time: 14:01
 */

use view\TemplateView;

?>
<div class="col-sm-10 text-left blue-background">
    <div class="form-clean">
        <form action="<?php echo $GLOBALS["ROOT_URL"]; ?>/password/request" method="post">
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Reset</button>
            </div>
        </form>
    </div>
</div>