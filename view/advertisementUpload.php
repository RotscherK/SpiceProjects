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
    include 'cloudinary/Settings.php';
}

isset($this->advertisement) ? $advertisement = $this->advertisement : $advertisement = new Advertisement();
isset($this->advertisementValidator) ? $advertisementValidator = $this->advertisementValidator : $advertisementValidator = new AdvertisementValidator();
isset($this->user) ? $user = $this->user : $user = new User();
?>

<?php
require 'advertisementEdit.php';
function create_photo($file_path, $advertisement)
{
    # Upload the received image file to Cloudinary
    $result = \Cloudinary\Uploader::upload($file_path, array(
        "tags" => "backend_photo_album",
        "public_id" => $advertisement->getID(),
    ));
    return $result;
}
$files = $_FILES["files"];
$files = is_array($files) ? $files : array( $files );
$files_data = array();
foreach ($files["tmp_name"] as $index => $value) {
    array_push($files_data, create_photo($value, $files["name"][$index]));
}
?>
