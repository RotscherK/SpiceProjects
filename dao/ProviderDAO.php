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
	public function getAllProviders() {
        $stmt = $this->pdoInstance->prepare('
            SELECT provider.id, provider.name, provider.description, provider.plz,
             provider.city, provider.street, provider.billing_email, provider.administrator, "user".email AS administratorEmail 
             FROM "provider" JOIN "user" ON provider.administrator="user".id ORDER BY provider.id;');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Provider");
	}

   /* public function getAdministratorEmail($administrator){
        $stmt = $this->pdoInstance->prepare('SELECT email FROM "user"
        WHERE id = :administratorId');
        $stmt->bindValue(':administratorId', $administrator);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchColumn();
        }
        return null;
    }*/

}
?>