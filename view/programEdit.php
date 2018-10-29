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
            <h2 class="text-center">Create/Edit program</h2>
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" placeholder="ID" readonly="true" <?php echo $program->getId() ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="type" class="col-sm-2 col-form-label">Type</label>
                <div class="col-sm-10">
                    <select class="form-control" id="type">
                        <option value="1" <?php if($program->getType() == '1'): ?> selected="selected"<?php endif; ?> >BB</option>
                        <option value="2" <?php if($program->getType() == '2'): ?> selected="selected"<?php endif; ?> >VZ</option>
                        <option value="3" <?php if($program->getType() == '3'): ?> selected="selected"<?php endif; ?> >VZ/BB</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label">Type</label>
                <div class="col-sm-10">
                    <select class="form-control" id="category">
                        <option value="1">Computer Science</option>
                        <option value="2">Economy</option>
                        <option value="3">Education</option>
                        <option value="4">Social</option>
                        <option value="5">Architect</option>
                    </select>
                </div>
            </div>

            <div class="form-group row <?php echo $programValidator->isNameError() ? "has-error" : ""; ?>">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="Name">
                </div>
                <p class="help-block"><?php echo $programValidator->getNameError() ?></p>
            </div>
            <div class="form-group row <?php echo $programValidator->isDescriptionError() ? "has-error" : ""; ?>">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="description" placeholder="Description">
                </div>
                <p class="help-block"><?php echo $programValidator->getDescriptionError() ?></p>
            </div>
            <div class="form-group row <?php echo $programValidator->isPriceError() ? "has-error" : ""; ?>">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="price" placeholder="Price">
                </div>
                <p class="help-block"><?php echo $programValidator->getPriceError() ?></p>
            </div>
            <div class="form-group row <?php echo $programValidator->isPriceError() ? "has-error" : ""; ?>">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="price" placeholder="Price">
                </div>
                <p class="help-block"><?php echo $programValidator->getPriceError() ?></p>
            </div>
            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                            <label class="form-check-label" for="gridRadios1">
                                First radio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                            <label class="form-check-label" for="gridRadios2">
                                Second radio
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
                            <label class="form-check-label" for="gridRadios3">
                                Third disabled radio
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="form-group row">
                <div class="col-sm-2">Checkbox</div>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1">
                        <label class="form-check-label" for="gridCheck1">
                            Example checkbox
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-5">
                    <button type="button" class="btn" name="cancel" value="Cancel" onClick="window.location='<?php echo $GLOBALS["ROOT_URL"]; ?>/';" />Cancle</button>
                </div>
                <div class="col-sm-5">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <div class="col-sm-10">

                </div>
            </div>
        </form>
    </div>
</div>