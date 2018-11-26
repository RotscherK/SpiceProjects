<?php
/**
 * Created by PhpStorm.
 * Category: roger.kaufmann
 * Date: 25.10.2018
 * Time: 10:08
 */

namespace service;

use domain\Category;

/**
 * @access public
 * @author roger.kaufmann
 */
interface CategoryService {

    /**
     * @access public
     * @param int categoryId
     * @return Category
     * @ParamType categoryId int
     * @ReturnType Category
     */
    public function readAllCategories();

}