<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 01.11.2017
 * Time: 13:52
 */

namespace service;

use config\Config;

class PDFServiceClient
{

    public static function sendPDF($htmlData){
        $jsonObj = self::createPDFJSONObj();
        $jsonObj->user = Config::get("pdf.hypdf-user");
        $jsonObj->password = Config::get("pdf.hypdf-password");
        $jsonObj->content = $htmlData;

        $options = ["http" => [
            "method" => "POST",
            "header" => ["Content-Type: application/json"],
            "content" => json_encode($jsonObj),
            'ignore_errors' => true
        ]];
        $context = stream_context_create($options);

        $response = file_get_contents("https://www.hypdf.com/htmltopdf", false, $context);
        print_r(self::parseHeaders($http_response_header));
        echo "<br><br><br>";
        if(strpos($http_response_header[0],"200"))
            return $response;
        return false;
    }

    static function  parseHeaders( $headers )
    {
        $head = array();
        foreach( $headers as $k=>$v )
        {
            $t = explode( ':', $v, 2 );
            if( isset( $t[1] ) )
                $head[ trim($t[0]) ] = trim( $t[1] );
            else
            {
                $head[] = $v;
                if( preg_match( "#HTTP/[0-9\.]+\s+([0-9]+)#",$v, $out ) )
                    $head['reponse_code'] = intval($out[1]);
            }
        }
        return $head;
    }

    protected static function createPDFJSONObj(){
        return json_decode('{"content": "HTML", "user": "HYPDF_USER", "password": "YOUR_HYPDF_PASSWORD", "test": "true"}');
    }
}