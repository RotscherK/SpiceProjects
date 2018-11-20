<?php
/**
 * Created by PhpStorm.
 * User: timothyapplewhite
 * Date: 04.11.18
 * Time: 16:39
 */

use view\TemplateView;
use domain\Provider;
use domain\User;
use validator\ProviderValidator;

isset($this->provider) ? $provider = $this->provider : $provider = new Provider();
isset($this->providerValidator) ? $providerValidator = $this->providerValidator : $providerValidator = new ProviderValidator();
isset($this->user) ? $user = $this->user : $user = new User();
?>

<div class="col-sm-10 text-left blue-background">
    <div class="form-clean">
        <form action="update" method="post">
            <h2 class="text-center">Create/Edit Provider</h2>

            <div class="form-group row" <?php if($provider->getId() == null): ?> style="display: none" <?php endif; ?>>
                <label for="id" class="col-sm-3 col-form-label">ID</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="id" id="id" placeholder="ID" readonly="true" value="<?php echo $provider->getId() ?>">
                </div>
            </div>
            <div class="form-group row <?php echo $providerValidator->isNameError()? "has-error" : ""; ?>">
                <label for="name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $provider->getName() ?>">
                    <small class="form-text text-danger"><?php echo $providerValidator->getNameError() ?></small>
                </div>
            </div>
            <div class="form-group row <?php echo $providerValidator->isDescriptionError()? "has-error" : ""; ?>">
                <label for="name" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="<?php echo $provider->getDescription() ?>">
                    <small class="form-text text-danger"><?php echo $providerValidator->getDescriptionError() ?></small>
                </div>
            </div>
            <div class="form-group row <?php echo $providerValidator->isPlzError()? "has-error" : ""; ?>">
                <label for="name" class="col-sm-3 col-form-label">PLZ</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="plz" id="plz" placeholder="PLZ" value="<?php echo $provider->getPlz() ?>">
                    <small class="form-text text-danger"><?php echo $providerValidator->getPlzError() ?></small>
                </div>
            </div>
            <div class="form-group row <?php echo $providerValidator->isCityError()? "has-error" : ""; ?>">
                <label for="name" class="col-sm-3 col-form-label">City</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="city" id="city" placeholder="City" value="<?php echo $provider->getCity() ?>">
                    <small class="form-text text-danger"><?php echo $providerValidator->getCityError() ?></small>
                </div>
            </div>
            <div class="form-group row <?php echo $providerValidator->isStreetError()? "has-error" : ""; ?>">
                <label for="name" class="col-sm-3 col-form-label">Street</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="street" id="street" placeholder="Street" value="<?php echo $provider->getStreet() ?>">
                    <small class="form-text text-danger"><?php echo $providerValidator->getStreetError() ?></small>
                </div>
            </div>
            <div class="form-group row <?php echo $providerValidator->isBillingEmailError()? "has-error" : "";?>">
                <label for="name" class="col-sm-3 col-form-label">PLZ</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="billingEmail" id="billingEmail" placeholder="Billing email" value="<?php echo $provider->getBillingEmail() ?>">
                    <small class="form-text text-danger"><?php echo $providerValidator->getBillingEmailError() ?></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="administrator" class="col-sm-3 col-form-label" name="administrator">Administrator</label>
                <div class="col-sm-9">
                    <select class="form-control" id="administrator" name="administrator">
                        <?php foreach($this->users as $user): /* @var User $user */ ?>
                            <option value=<?php echo $user->getId() ?>><?php echo $user->getEmail() ?></option>
                        <?php endforeach; ?>
                    </select>
                    <small class="form-text text-danger"><?php echo $providerValidator->getAdministratorError() ?></small>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6">
                    <button type="button" class="btn btn-secondary btn-block" name="cancel" value="Cancel" onClick="window.location='<?php echo $GLOBALS["ROOT_URL"]; ?>/';">Cancel</button>
                </div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </div>

            </div>
        </form>
    </div>
</div>
