<?php
/**
 * Created by PhpStorm.
 * User: timothyapplewhite
 * Date: 04.11.18
 * Time: 16:39
 */

use view\TemplateView;
use domain\User;
use validator\UserValidator2;

isset($this->user) ? $user = $this->user : $user = new User();
isset($this->userValidator) ? $userValidator = $this->userValidator : $userValidator = new UserValidator2();
?>

<div class="col-sm-10 text-left blue-background">
    <div class="form-clean">
        <form action="update" method="post">
            <h2 class="text-center">Create/Edit user</h2>

            <div class="form-group row" <?php if($user->getId() == null): ?> style="display: none" <?php endif; ?>>
                <label for="id" class="col-sm-3 col-form-label">ID</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="id" id="id" placeholder="ID" readonly="true" value="<?php echo $user->getId() ?>">
                </div>
            </div>
            <div class="form-group row <?php echo $userValidator->isNameError()? "has-error" : ""; ?>">
                <label for="name" class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" value="<?php echo $user->getFirstname() ?>">
                    <small class="form-text text-danger"><?php echo $userValidator->getNameError() ?></small>
                </div>
            </div>
            <div class="form-group row <?php echo $userValidator->isNameError()? "has-error" : ""; ?>">
                <label for="name" class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo $user->getLastname() ?>">
                    <small class="form-text text-danger"><?php echo $userValidator->getNameError() ?></small>
                </div>
            </div>
            <div class="form-group row <?php echo $userValidator->isEmailError()? "has-error" : ""; ?>">
                <label for="name" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $user->getEmail() ?>">
                    <small class="form-text text-danger"><?php echo $userValidator->getEmailError() ?></small>
                </div>
            </div>
            <div class="form-group row <?php echo $userValidator->isPasswordError()? "has-error" : ""; ?>">
                <label for="name" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" name="password" id="password" placeholder="" value="">
                    <small class="form-text text-danger"><?php echo $userValidator->getPasswordError() ?></small>
                </div>
            </div>
            <div class="form-group row <?php echo $userValidator->isPasswordError()? "has-error" : ""; ?>">
                <label for="name" class="col-sm-3 col-form-label">Repeat Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" name="passwordRepeat" id="passwordRepeat" placeholder="" value="">
                    <small class="form-text text-danger"><?php echo $userValidator->getPasswordRepeatError() ?></small>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-5">
                    <button type="button" class="btn btn-secondary" name="cancel" value="Cancel" onClick="window.location='<?php echo $GLOBALS["ROOT_URL"]; ?>/';">Cancel</button>
                </div>
                <div class="col-sm-5">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </div>
        </form>
    </div>
</div>
