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
        <form action="<?php echo $GLOBALS["ROOT_URL"]; ?>/password/reset" method="post">
            <div class="page-header"><h2 class="text-center"><strong>Reset your Password</strong></h2></div>
            <input type="hidden" name="token" value="<?php echo TemplateView::noHTML($this->token); ?>"/>
            <div class="form-group <?php echo isset($this->agentValidator) && $this->agentValidator->isPasswordError() ? "has-error" : ""; ?>">
                <input class="form-control" type="password" name="password" placeholder="Password">
                <p class="help-block"><?php echo isset($this->agentValidator) && $this->agentValidator->isPasswordError() ? $this->agentValidator->getPasswordError() : ""; ?></p>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Reset</button>
            </div>
        </form>
    </div>
</div>
