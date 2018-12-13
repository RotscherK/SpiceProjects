<?php
/**
 * Created by PhpStorm.
 * User: timothyapplewhite
 * Date: 15.11.18
 * Time: 11:01
 */

namespace validator;

use domain\Advertisement;
use http\HTTPException;
use http\HTTPStatusCode;

class AdvertisementValidator
{
    private $valid = true;
    private $titleError = null;
    private $contentError = null;
    private $urlError = null;
    private $administratorError = null;
    private $imagelinkError = null;

    public function __construct(Advertisement $advertisement = null)
    {
        if (!is_null($advertisement)){
            $this->validate($advertisement);
        }
    }

    public function validate(Advertisement $advertisement)
    {
        if (!is_null($advertisement)) {

            if ($_SESSION["userLogin"]["siteAdmin"] == true || $advertisement->getUserAdmin() == $_SESSION["userLogin"]["userID"]) {

            if (empty($advertisement->getTitle())) {
                $this->titleError = 'Please enter the title';
                $this->valid = false;
            }
            if (empty($advertisement->getContent())) {
                $this->contentError = 'Please enter the content';
                $this->valid = false;
            }elseif ((strlen($advertisement->getContent()))>50){
                $this->contentError = 'Please keep the description below 50 characters';
                $this->valid = false;
            }
            if (empty($advertisement->getURL())) {
                $this->urlError = 'Please enter a URL';
                $this->valid = false;
            }elseif((strpos($advertisement->getURL(), "https://")!==0) && (strpos($advertisement->getURL(), "http://")!==0)) {
                    $this->urlError = 'Please start the link with http:// or https://';
                    $this->valid = false;
                }
               /** if (empty($advertisement->getImage())){
                    $this->imagelinkError = 'Please select a Image';
                    $this->valid = false;
            }else {

                }*/

            if (empty($advertisement->getUserAdmin())) {
                $this->administratorError = 'Please select an administrator';
                $this->valid = false;
            }

            }else{
                throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
            }

        } else {
            $this->valid = false;
        }
        return $this->valid;

    }

    public function isValid()
    {
        return $this->valid;
    }

    public function isTitleError()
    {
        return isset($this->titleError);
    }

    public function getTitleError()
    {
        return $this->titleError;
    }
    public function isContentError()
    {
        return isset($this->contentError);
    }

    public function getContentError()
    {
        return $this->contentError;
    }

    public function isURLError()
    {
        return isset($this->urlError);
    }

    public function getURLError()
    {
        return $this->urlError;
    }

    public function isAdministratorError()
    {
        return isset($this->administratorError);
    }
    public function getAdministratorError()
    {
        return $this->administratorError;
    }

    public function isImageError()
    {
        return isset($this->imagelinkError);
    }
    public function getImageError()
    {
        return $this->imagelinkError;
    }

}