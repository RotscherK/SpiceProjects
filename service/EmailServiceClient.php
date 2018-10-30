<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 22.10.2018
 * Time: 14:08
 */

namespace service;

use config\Config;

class EmailServiceClient
{

    public static function sendEmail($toEmail, $subject, $htmlData){
        $jsonObj = self::createEmailJSONObj();
        $jsonObj->personalizations[0]->to[0]->email = $toEmail;
        $jsonObj->from->email = "spice.project.test@test.com";
        $jsonObj->from->name = "Spice Projects";

        $jsonObj->subject = $subject;
        $jsonObj->content[0]->value = $htmlData;

        $options = ["http" => [
            "method" => "POST",
            "header" => ["Content-Type: application/json",
                "Authorization: Bearer ".Config::emailConfig("sendgrid-apikey").""],
            "content" => json_encode($jsonObj)
        ]];
        $context = stream_context_create($options);
        $response = file_get_contents("https://api.sendgrid.com/v3/mail/send", false, $context);
        if(strpos($http_response_header[0],"202"))
            return true;
        return false;
    }

    protected static function createEmailJSONObj(){
        return json_decode('{
          "personalizations": [
            {
              "to": [
                {
                  "email": "email"
                }
              ]
            }
          ],
          "from": {
            "email": "noreply@fhnw.ch",
            "name": "SpiceProjects"
          },
          "subject": "subject",
          "content": [
            {
              "type": "text/html",
              "value": "value"
            }
          ]
        }');
    }
}