<?php

if (is_file(__DIR__ . '/../cloudinary/autoload.php') && is_readable(__DIR__ . '/../cloudinary/autoload.php')) {
    require_once __DIR__.'/../cloudinary/autoload.php';
} else {
    // Fallback to legacy autoloader
    require_once __DIR__.'/../cloudinary/autoload.php';
}
if (file_exists('/../cloudinary/Settings.php')) {
    include '/../cloudinary/Settings.php';
}
class advertisementUpload{

public function upload(Image $image)
{
    Uploader::upload((string) $image, array("public_id" => $image->getId()));
}
}

