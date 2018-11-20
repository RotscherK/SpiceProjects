<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 22.10.2018
 * Time: 21:48
 */

namespace dao;

use domain\Category;

/**
 * @access public
 * @author roger.kaufmann
 */
class CategoryDAO extends BasicDAO {

	/**
	 * @access public
	 * @param int categoryId
	 * @return Category
	 * @ParamType categoryId int
	 * @ReturnType Category
	 */
	public function read($categoryId) {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM "category" WHERE id = :id;');
        $stmt->bindValue(':id', $categoryId);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Category")[0];
        }
        return null;
	}

	/**
	 * @access public
	 * @return Category[]
	 * @ReturnType Category[]
	 */
	public function getAllCategories() {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM "category" ORDER BY id;');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Category");
	}
}
?>