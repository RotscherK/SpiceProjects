<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 29.10.2018
 * Time: 08:06
 */
use view\TemplateView;
use domain\Program;
use domain\Provider;
use validator\ProgramValidator;

isset($this->program) ? $program = $this->program : $program = new Program();
isset($this->provider) ? $provider = $this->provider : $provider = new Provider();
isset($this->programValidator) ? $programValidator = $this->programValidator : $programValidator = new ProgramValidator();
?>

<div class="col-sm-10 text-left blue-background">
    <div class="form-clean">
        <form action="update" method="post">
            <h2 class="text-center">Create/Edit program</h2>

            <div class="form-group row" <?php if($program->getId() == null): ?> style="display: none" <?php endif; ?>>
                <label for="id" class="col-sm-3 col-form-label">ID</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="id" id="id" placeholder="ID" readonly="true" value="<?php echo $program->getId() ?>">
                </div>
            </div>
            <div class="form-group row <?php echo $programValidator->isNameError() ? "has-error" : ""; ?>">
                <label for="name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $program->getName() ?>">
                    <small class="form-text text-danger"><?php echo $programValidator->getNameError() ?></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="provider" class="col-sm-3 col-form-label" name="provider" >Provider</label>
                <div class="col-sm-9">
                    <select class="form-control" id="provider" name="provider">
                        <?php foreach($this->providers as $provider): /* @var Provider $provider */ ?>
                            <option value="<?php echo $provider->getID(); ?>" <?php if($program->getProviderId() == $provider->getID()): ?> selected="selected"<?php endif; ?>> <?php echo $provider->getName() ?> </option>
                        <?php endforeach; ?>
                    </select>
                    <small class="form-text text-danger"><?php echo $programValidator->getProviderIDError() ?></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="type" class="col-sm-3 col-form-label">Type</label>
                <div class="col-sm-9">
                    <select class="form-control" id="type" name="type">
                        <option value="1" <?php if($program->getType() == '1'): ?> selected="selected"<?php endif; ?> >Parttime</option>
                        <option value="2" <?php if($program->getType() == '2'): ?> selected="selected"<?php endif; ?> >Fulltime</option>
                        <option value="3" <?php if($program->getType() == '3'): ?> selected="selected"<?php endif; ?> >Parttime/Fulltime</option>
                    </select>
                    <small class="form-text text-danger"><?php echo $programValidator->getTypeError() ?></small>

                </div>
            </div>
            <div class="form-group row">
                <label for="category" class="col-sm-3 col-form-label">Category</label>
                <div class="col-sm-9">
                    <select class="form-control" id="category" name="category">
                        <option value="1" <?php if($program->getCategoryId() == '1'): ?> selected="selected"<?php endif; ?> >Computer Science</option>
                        <option value="2" <?php if($program->getCategoryId() == '2'): ?> selected="selected"<?php endif; ?> >Economy</option>
                        <option value="3" <?php if($program->getCategoryId() == '3'): ?> selected="selected"<?php endif; ?> >Education</option>
                        <option value="4" <?php if($program->getCategoryId() == '4'): ?> selected="selected"<?php endif; ?> >Social</option>
                        <option value="5" <?php if($program->getCategoryId() == '5'): ?> selected="selected"<?php endif; ?> >Architect</option>
                    </select>
                    <small class="form-text text-danger"><?php echo $programValidator->getCategoryIDError() ?></small>

                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3">
                    <label class="form-check-label" for="distance_learning">
                        Distance Learning
                    </label>
                </div>
                <div class="col-sm-9">
                    <input class="form-check-input" type="checkbox" name="distance_learning" style="margin-left:0px;" id="distance_learning" <?php echo ($program->getDistanceLearning()==true ? 'checked' : '');?>>
                </div>
            </div>
            <div class="form-group row">
                <label for="degree" class="col-sm-3 col-form-label">Degree</label>
                <div class="col-sm-9">
                    <select class="form-control" id="degree" name="degree">
                        <option value="bachelor" <?php if($program->getDegree() == 'Bachelor'): ?> selected="selected"<?php endif; ?> >Bachelor</option>
                        <option value="master" <?php if($program->getDegree() == 'Master'): ?> selected="selected"<?php endif; ?> >Master</option>
                        <option value="other" <?php if($program->getDegree() == 'Other'): ?> selected="selected"<?php endif; ?> >Other</option>
                    </select>
                    <small class="form-text text-danger"><?php echo $programValidator->getDegreeError() ?></small>

                </div>
            </div>

            <div class="form-group row <?php echo $programValidator->isPriceError() ? "has-error" : ""; ?>">
                <label for="price" class="col-sm-3 col-form-label">Price</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="price" name="price" step="0.05" placeholder="Price" value="<?php echo $program->getPrice() ?>">
                    <small class="form-text text-danger"><?php echo $programValidator->getPriceError() ?></small>
                </div>
            </div>
            <div class="form-group row <?php echo $programValidator->isDurationError() ? "has-error" : ""; ?>">
                <label for="duration" class="col-sm-3 col-form-label">Duration</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="duration" name="duration"  placeholder="Duration" value="<?php echo $program->getDuration() ?>">
                    <small class="form-text text-danger"><?php echo $programValidator->getDurationError() ?></small>
                </div>
            </div>
            <div class="form-group row <?php echo $programValidator->isDescriptionError() ? "has-error" : ""; ?>">
                <label for="description" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-9">
                    <textarea class="form-control" rows="20" id="description" name="description" placeholder="Description"><?php echo $program->getDescription() ?></textarea>
                    <small class="form-text text-danger"><?php echo $programValidator->getDescriptionError() ?></small>
                </div>
            </div>
            <div class="form-group row <?php echo $programValidator->isRequirementError() ? "has-error" : ""; ?>">
                <label for="requirement" class="col-sm-3 col-form-label">Requirements</label>
                <div class="col-sm-9">
                    <textarea class="form-control" rows="20" id="requirement" name="requirement"  placeholder="Requirements"><?php echo $program->getRequirement() ?></textarea>
                    <small class="form-text text-danger"><?php echo $programValidator->getRequirementError() ?></small>
                </div>
            </div>
            <div class="form-group row <?php echo $programValidator->isURLError() ? "has-error" : ""; ?>">
                <label for="url" class="col-sm-3 col-form-label">URL</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="url" name="url"  placeholder="URL" value="<?php echo $program->getUrl() ?>">
                    <small class="form-text text-danger"><?php echo $programValidator->getURLError() ?></small>
                </div>
            </div>
            <div class="form-group row <?php echo $programValidator->isStartDateError() ? "has-error" : ""; ?>">
                <label for="expiration" class="col-sm-3 col-form-label">Start Date</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="startDate" name="startDate"  placeholder="Start Date" value="<?php echo $program->getStartDate() ?>">
                    <small class="form-text text-danger"><?php echo $programValidator->getStartDateError() ?></small>
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