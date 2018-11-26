<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 22.10.2018
 * Time: 22:09
 */

namespace service;

use domain\Category;
use dao\CategoryDAO;
use http\HTTPException;
use http\HTTPStatusCode;

class CategoryServiceImpl implements CategoryService
{


    /**
     * @access public
     * @return Category[]
     * @ReturnType Category[]
     * @throws HTTPException
     */
    public function getAllCategories() {
        $categoryDAO = new CategoryDAO();
        return $categoryDAO->getAllCategories();
    }

}