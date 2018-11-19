<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 29.10.2018
 * Time: 08:06
 */
use view\TemplateView;
use domain\User;
use validator\UserValidator;

isset($this->user) ? $user = $this->user : $user = new User();
isset($this->userValidator) ? $userValidator = $this->userValidator : $userValidator = new UserValidator();
?>

<div class="col-sm-10 text-left blue-background">
    <div class="form-clean">
        <form action="<?php echo $GLOBALS["ROOT_URL"]; ?>/login" method="post">
            <h2 class="text-center">Login</h2>
            <div class="form-group">
                <input class="form-control <?php echo $userValidator->isEmailError() ? "is-invalid" : ""; ?>" type="email" name="email" value="a.b@c.com" placeholder="Email">
                <small class="form-text text-danger"><?php echo $userValidator->getEmailError(); ?></small>
            </div>
            <div class="form-group">
                <input class="form-control <?php echo $userValidator->isPasswordError() ? "is-invalid" : ""; ?>" type="password" name="password" value="a" placeholder="Password">
                <small class="form-text text-danger"><?php echo $userValidator->getPasswordError(); ?></small>
            </div>
            <div class="form-group">
                <div class="form-control">
                    <div class="checkbox">
                        <label class="control-label">
                            <input type="checkbox" name="remember" />Remember me for 30 days Test : <?php echo isset($_SESSION["currentPath"]) ? $_SESSION["currentPath"] : "" ; ?>
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-primary pull-right" type="submit">Log In</button>
            </div>
                <a class="text-primary already" href="<?php echo $GLOBALS["ROOT_URL"]; ?>/password/request">Opps, I forgot my password.</a><br>
                <a class="text-primary already" href="<?php echo $GLOBALS[" ROOT_URL"]; ?>/register">Register here.</a>
        </form>
    </div>
</div>
