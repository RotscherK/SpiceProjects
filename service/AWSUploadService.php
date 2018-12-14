<?php
/**
 * Created by PhpStorm.
 * User: Nicola Niklaus
 * Date: 11.12.2018
 * Time: 17:24
 */

namespace service;

use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;
use config\Config;


class AWSUploadService {

    public function uploadImage($image) {

        require __DIR__ . '/../amazon/aws-autoloader.php';
        //S3 Setup
        $s3 = new S3Client([
            'key' => config::get("aws.access-key"),
            'secret' => config::get("aws.secret-access-key"),
            'version' => 'latest',
            'region' => 'eu-west-2'
        ]);

        //File details
        $name =$image['name'];
        $tmp_name = $image['tmp_name'];
        $extentsion = explode('.', $name);
        $extentsion = strtolower(end($extentsion));

        //Temp details
        $key = md5(uniqid());
        $tmp_file_name = "{$key}.{$extentsion}";
        $tmp_file_path = "files/{$tmp_file_name}";

        //Move the file
        move_uploaded_file($tmp_name, $tmp_file_path);

        try {
            //Upload Image
            $result = $s3->putObject([
                'Bucket' =>  'spiceprojects',
                'Key' => "uploads/{$tmp_file_name}",
                'Body' => fopen($tmp_file_path, 'rb'),
                'ACL' => 'public-read'
            ]);
            //Remove the file from tmp folder
            unlink($tmp_file_path);
            //Print the URL to the object
           return $result['ObjectURL'] . PHP_EOL;
        } catch(Aws\S3\Exception\S3Exception $e){
            return $e ->getMessage() . PHP_EOL;
        }
    }
}