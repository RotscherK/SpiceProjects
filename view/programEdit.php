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
                    <input type="text" class="form-control" id="id" placeholder="ID" readonly="true" value="<?php echo $program->getId() ?>">
                </div>
            </div>
            <div class="form-group row <?php echo $programValidator->isNameError() ? "has-error" : ""; ?>">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="Name" value="<?php echo $program->getName() ?>">
                </div>
                <p class="help-block"><?php echo $programValidator->getNameError() ?></p>
            </div>
            <div class="form-group row">
                <label for="provider" class="col-sm-2 col-form-label">Provider</label>
                <div class="col-sm-10">
                    <select class="form-control" id="provider">
                        <option value="1" <?php if($program->getCategoryId() == '1'): ?> selected="selected"<?php endif; ?> >FHNW</option>
                        <option value="2" <?php if($program->getCategoryId() == '2'): ?> selected="selected"<?php endif; ?> >Uni Basel</option>
                        <option value="3" <?php if($program->getCategoryId() == '3'): ?> selected="selected"<?php endif; ?> >Uni Bern</option>
                        <option value="4" <?php if($program->getCategoryId() == '4'): ?> selected="selected"<?php endif; ?> >IKT</option>
                        <option value="5" <?php if($program->getCategoryId() == '5'): ?> selected="selected"<?php endif; ?> >FHBO</option>
                    </select>
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
                <label for="category" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                    <select class="form-control" id="category">
                        <option value="1" <?php if($program->getCategoryId() == '1'): ?> selected="selected"<?php endif; ?> >Computer Science</option>
                        <option value="2" <?php if($program->getCategoryId() == '2'): ?> selected="selected"<?php endif; ?> >Economy</option>
                        <option value="3" <?php if($program->getCategoryId() == '3'): ?> selected="selected"<?php endif; ?> >Education</option>
                        <option value="4" <?php if($program->getCategoryId() == '4'): ?> selected="selected"<?php endif; ?> >Social</option>
                        <option value="5" <?php if($program->getCategoryId() == '5'): ?> selected="selected"<?php endif; ?> >Architect</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <input class="form-check-input" type="checkbox" id="distance_learning" <?php echo ($program->getName()==true ? 'checked' : '');?>>
                <label class="form-check-label" for="distance_learning">
                    Distance Learning
                </label>
            </div>
            <div class="form-group row">
                <label for="degree" class="col-sm-2 col-form-label">Degree</label>
                <div class="col-sm-10">
                    <select class="form-control" id="degree">
                        <option value="bachelor" <?php if($program->getCategoryId() == 'bachelor'): ?> selected="selected"<?php endif; ?> >Bachelor</option>
                        <option value="master" <?php if($program->getCategoryId() == 'master'): ?> selected="selected"<?php endif; ?> >Master</option>
                        <option value="other" <?php if($program->getCategoryId() == 'other'): ?> selected="selected"<?php endif; ?> >Other</option>
                    </select>
                </div>
            </div>

            <div class="form-group row <?php echo $programValidator->isPriceError() ? "has-error" : ""; ?>">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="price" placeholder="Price" value="<?php echo $program->getPrice() ?>">
                </div>
                <p class="help-block"><?php echo $programValidator->getPriceError() ?></p>
            </div>
            <div class="form-group row <?php echo $programValidator->isDurationError() ? "has-error" : ""; ?>">
                <label for="duration" class="col-sm-2 col-form-label">Duration</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="duration" placeholder="Duration" value="<?php echo $program->getDuration() ?>">
                </div>
                <p class="help-block"><?php echo $programValidator->getDurationError() ?></p>
            </div>
            <div class="form-group row <?php echo $programValidator->isDescriptionError() ? "has-error" : ""; ?>">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="description" placeholder="Description" value="<?php echo $program->getDescription() ?>">
                </div>
                <p class="help-block"><?php echo $programValidator->getDescriptionError() ?></p>
            </div>
            <div class="form-group row <?php echo $programValidator->isRequirementError() ? "has-error" : ""; ?>">
                <label for="requirement" class="col-sm-2 col-form-label">Requirements</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="requirement" placeholder="Requirements" value="<?php echo $program->getRequirement() ?>">
                </div>
                <p class="help-block"><?php echo $programValidator->getRequirementError() ?></p>
            </div>
            <div class="form-group row <?php echo $programValidator->isURLError() ? "has-error" : ""; ?>">
                <label for="url" class="col-sm-2 col-form-label">URL</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="url" placeholder="URL" value="<?php echo $program->getUrl() ?>">
                </div>
                <p class="help-block"><?php echo $programValidator->getURLError() ?></p>
            </div>
            <div class="form-group row <?php echo $programValidator->isExpirationError() ? "has-error" : ""; ?>">
                <label for="expiration" class="col-sm-2 col-form-label">Expiration Date</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="expiration" placeholder="Expiration Date" value="<?php echo $program->getExpiration() ?>">
                </div>
                <p class="help-block"><?php echo $programValidator->getExpirationError() ?></p>
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