<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 22.10.2018
 * Time: 21:48
 */

namespace dao;

use domain\Provider;

/**
 * @access public
 * @author roger.kaufmann
 */
class ProgramDAO extends BasicDAO {

    /**
     * @access public
     * @return Provider[]
     * @ReturnType Provider[]
     */
    public function getProvider() {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM "provider" ORDER BY id;');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Provider");
    }

	/**
	 * @access public
	 * @return Provider[]
	 * @ReturnType Provider[]
	 */
	public function getAllProvider() {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM "provider" ORDER BY id;');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Provider");
	}
}
?>