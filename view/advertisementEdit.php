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

if (is_file(__DIR__ . '/../cloudinary/autoload.php') && is_readable(__DIR__ . '/../cloudinary/autoload.php')) {
    require_once __DIR__.'/../cloudinary/autoload.php';
} else {
    // Fallback to legacy autoloader
    require_once __DIR__.'/../cloudinary/autoload.php';
}
if (file_exists('/../cloudinary/Settings.php')) {
    include '/../cloudinary/Settings.php';
}

isset($this->advertisement) ? $advertisement = $this->advertisement : $advertisement = new Advertisement();
isset($this->advertisementValidator) ? $advertisementValidator = $this->advertisementValidator : $advertisementValidator = new AdvertisementValidator();
isset($this->user) ? $user = $this->user : $user = new User();
?>

<div class="col-sm-10 text-left blue-background">
    <div class="form-clean">
        <form action="update" method="post">
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
                            <option value=<?php echo $user->getId() ?>><?php echo $user->getEmail() ?></option>
                        <?php endforeach; ?>
                    </select>
                    <small class="form-text text-danger"><?php echo $advertisementValidator->getAdministratorError() ?></small>
                </div>
                <label for="Image" class="col-sm-3 col-form-label">Image</label>
                    <?php
                    if(isset($POST['Upload Image'])){
                        $file_tmp = $_FILES['']['tmp_name'];
                        \cloudinary\Uploader::upload($file_tmp, array("public_id" => $advertisement->getID()));
                    }
                    ?>
                <form method="post" enctype="multipart/form-data">
                    <input type="file" name="file">
                    <input type="submit" value="Upload Image" name="submit">
                </form>
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
