<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 29.10.2018
 * Time: 08:06
 */
use view\TemplateView;
use domain\Program;
use validator\ProgramValidator;

isset($this->program) ? $program = $this->program : $program = new Program();
isset($this->programValidator) ? $programValidator = $this->programValidator : $programValidator = new ProgramValidator();
?>

<div class="col-sm-10 text-left blue-background">
    <div class="form-clean">
        <form action="update" method="post">
            <h2 class="text-center">Edit program</h2>
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-8"><input class="form-control" type="text" name="id" readonly="" value="<?php echo $program->getId() ?>">
                </div>
            </div>
            <div class="form-group <?php echo $programValidator->isNameError() ? "has-error" : ""; ?>">
                <div class="input-group row">
                    <div class="input-group-addon col-sm-2"><span>Name </span></div>
                    <input class="form-control col-sm-8" type="text" name="name" value="<?php echo TemplateView::noHTML($program->getName()) ?>">
                </div>
                <p class="help-block"><?php echo $programValidator->getNameError() ?></p>
            </div>
            <div class="form-group <?php echo $programValidator->isDescriptionError() ? "has-error" : ""; ?>">
                <div class="input-group">
                    <div class="input-group-addon"><span>Description </span></div>
                    <input class="form-control" type="text" name="description" value="<?php echo TemplateView::noHTML($program->getDescription()) ?>">
                </div>
                <p class="help-block"><?php echo $programValidator->getDescriptionError() ?></p>
            </div>
            <div class="form-group <?php echo $programValidator->isPriceError() ? "has-error" : ""; ?>">
                <div class="input-group">
                    <div class="input-group-addon"><span>Price </span></div>
                    <input class="form-control" type="currency" name="price" value="<?php echo TemplateView::noHTML($program->getPrice()) ?>">
                </div>
                <p class="help-block"><?php echo $programValidator->getPriceError() ?></p>
            </div>

            <div class="form-group <?php echo $programValidator->isExpirationError() ? "has-error" : ""; ?>">
                <div class="input-group">
                    <div class="input-group-addon"><span>Expiration Date </span></div>
                    <input class="form-control" type="date" name="expiration_date" value="<?php echo TemplateView::noHTML($program->getExpiration()) ?>">
                </div>
                <p class="help-block"><?php echo $programValidator->getExpirationError() ?></p>
            </div>

            <div class="form-group <?php echo $programValidator->isRequirementError() ? "has-error" : ""; ?>">
                <div class="input-group">
                    <div class="input-group-addon"><span>Requirement </span></div>
                    <input class="form-control" type="currency" name="price" value="<?php echo TemplateView::noHTML($program->getRequirement()) ?>">
                </div>
                <p class="help-block"><?php echo $programValidator->getRequirementError() ?></p>
            </div>

            <div class="form-group <?php echo $programValidator->isProviderIDError() ? "has-error" : ""; ?>">
                <div class="input-group">
                    <div class="input-group-addon"><span>Provider </span></div>
                    <input class="form-control" type= name="Provider" value="<?php echo TemplateView::noHTML($program->getProviderID()) ?>">
                </div>
                <p class="help-block"><?php echo $programValidator->getProviderIDError() ?></p>
            </div>
          

            <div class="form-group">
                <button class="btn btn-primary pull-right" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>