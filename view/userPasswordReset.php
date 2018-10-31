<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.09.2017
 * Time: 21:28
 */

use view\TemplateView;

?>
<div class="col-sm-10 text-left blue-background">
    <div class="form-clean">
        <div class="page-header">
            <h2 class="text-center"><strong>I forgot my password.</strong></h2></div>
        <form action="<?php echo $GLOBALS["ROOT_URL"]; ?>/password/reset" method="post">
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
