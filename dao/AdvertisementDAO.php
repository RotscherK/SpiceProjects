<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 22.10.2018
 * Time: 21:48
 */

namespace dao;

use domain\Advertisement;

/**
 * @access public
 * @author nicola.niklaus
 */
class AdvertisementDAO extends BasicDAO {

    /**
     * @access public
     * @param int advertisementId
     * @return Advertisement
     * @ParamType advertisementId int
     * @ReturnType Advertisement
     */
    public function read($advertisementId) {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM "advertisement" WHERE id = :id;');
        $stmt->bindValue(':id', $advertisementId);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Advertisement")[0];
        }
        return null;
    }

    public function delete(Advertisement $advertisement) {
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM "advertisement"
            WHERE id = :id;');
        $stmt->bindValue(':id', $advertisement->getId());
        $stmt->execute();
    }

    /**
     * @access public
     * @param Advertisement advertisement
     * @return Advertisement
     * @ParamType advertisement Advertisement
     * @ReturnType Advertisement
     */
    public function update(Advertisement $advertisement) {
        $stmt = $this->pdoInstance->prepare('
                UPDATE "advertisement" SET title=:title, content=:content, url=:url, administrator=:administrator WHERE id = :id;');
        $stmt->bindValue(':id', $advertisement->getId());
        $stmt->bindValue(':title', $advertisement->getTitle());
        $stmt->bindValue(':content', $advertisement->getContent());
        $stmt->bindValue(':url', $advertisement->getURL());
        $stmt->bindValue(':administrator', $advertisement->getUserAdmin());
        $stmt->execute();
        return $this->read($advertisement->getId());
    }

	/**
	 * @access public
	 * @return Advertisement[]
	 * @ReturnType Advertisement[]
	 */


	public function getAllAdvertisements() {
        $stmt = $this->pdoInstance->prepare('
            SELECT advertisement.id, advertisement.title, advertisement.content, advertisement.url, advertisement.administrator, "user".email AS administratorEmail
             FROM "advertisement" JOIN "user" ON advertisement.administrator="user".id ORDER BY advertisement.id;');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Advertisement");
	}

    public function getAdministratorEmail($administrator){
        $stmt = $this->pdoInstance->prepare('SELECT email FROM "user"
        WHERE id = :administratorId');
        $stmt->bindValue(':administratorId', $administrator);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchColumn();
        }
        return null;
    }
}
