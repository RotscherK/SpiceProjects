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
class ProviderDAO extends BasicDAO {

    /**
     * @access public
     * @param int providerId
     * @return Provider
     * @ParamType providerId int
     * @ReturnType Provider
     */
    public function read($providerId) {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM "provider" WHERE id = :id;');
        $stmt->bindValue(':id', $providerId);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Provider")[0];
        }
        return null;
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