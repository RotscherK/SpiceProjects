<?php
/**
 * Created by PhpStorm.
 * User: timothyapplewhite
 * Date: 04.11.18
 * Time: 16:39
 */

use view\TemplateView;
use domain\Advertisement;
use domain\User;
use validator\AdvertisementValidator;
use config\Config;
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

require __DIR__ .'/../amazon/aws-autoloader.php';

isset($this->advertisement) ? $advertisement = $this->advertisement : $advertisement = new Advertisement();
isset($this->advertisementValidator) ? $advertisementValidator = $this->advertisementValidator : $advertisementValidator = new AdvertisementValidator();
isset($this->user) ? $user = $this->user : $user = new User();
?>

<div class="col-sm-10 text-left blue-background">
    <div class="form-clean">
        <form action="update" method="post" enctype="multipart/form-data">
            <h2 class="text-center">Create/Edit Advertisement</h2>

            <div class="form-group row" <?php if($advertisement->getId() == null): ?> style="display: none" <?php endif; ?>>
                <label for="id" class="col-sm-3 col-form-label">ID</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="id" id="id" placeholder="ID" readonly="true" value="<?php echo $advertisement->getId() ?>">
                </div>
            </div>
            <div class="form-group row <?php echo $advertisementValidator->isTitleError()? "has-error" : ""; ?>">
                <label for="title" class="col-sm-3 col-form-label">Title</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $advertisement->getTitle() ?>">
                    <small class="form-text text-danger"><?php echo $advertisementValidator->getTitleError() ?></small>
                </div>
            </div>
            <div class="form-group row <?php echo $advertisementValidator->isContentError()? "has-error" : ""; ?>">
                <label for="content" class="col-sm-3 col-form-label">Content</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="content" id="content" placeholder="Content" value="<?php echo $advertisement->getContent() ?>">
                    <small class="form-text text-danger"><?php echo $advertisementValidator->getContentError() ?></small>
                </div>
            </div>
            <div class="form-group row <?php echo $advertisementValidator->isURLError()? "has-error" : ""; ?>">
                <label for="url" class="col-sm-3 col-form-label">URL</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="url" id="url" placeholder="URL" value="<?php echo $advertisement->getURL() ?>">
                    <small class="form-text text-danger"><?php echo $advertisementValidator->getURLError() ?></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="administrator" class="col-sm-3 col-form-label" name="administrator">Administrator</label>
                <div class="col-sm-9">
                    <select class="form-control" id="administrator" name="administrator">
                        <?php foreach($this->users as $user): /* @var User $user */ ?>
                            <option value=<?php echo $user->getId(); if($advertisement->getUserAdmin()==$user->getId()): ?> selected="selected" <?php endif; ?><?php echo $user->getEmail() ?></option>
                        <?php endforeach; ?>
                    </select>
                    <small class="form-text text-danger"><?php echo $advertisementValidator->getAdministratorError() ?></small>
                </div>
            </div>
                <div class="form-group row">
                <label for="Image" class="col-sm-3 col-form-label">Image</label>
                    <div class="col-sm-9">
                <?php
                $link = $advertisement->getImage();
                echo isset($link) ? "<img width='150px' src=$link>" : ""?>
                    </div>
                    <div class="col-sm-9">
                    <input type="file" name="image">
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
