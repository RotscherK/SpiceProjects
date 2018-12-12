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
     * @param Advertisment advertisment
     * @return Advertisment
     * @ParamType advertisment Advertisment
     * @ReturnType Advertisment
     */
    public function create(Advertisement $advertisement) {
        $stmt = $this->pdoInstance->prepare('
        INSERT INTO "advertisement" (title, content, url, administrator, image)
        VALUES (:title, :content, :url, :administrator, :image)');
        $stmt->bindValue(':title', $advertisement->getTitle());
        $stmt->bindValue(':content', $advertisement->getContent());
        $stmt->bindValue(':url', $advertisement->getURL());
        $stmt->bindValue(':administrator', $advertisement->getUserAdmin());
        $stmt->bindValue(':image', $advertisement->getImage());
        $stmt->execute();
        return $this->read($this->pdoInstance->lastInsertId());
    }

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
                UPDATE "advertisement" SET title=:title, content=:content, url=:url, administrator=:administrator, image=:image WHERE id = :id;');
        $stmt->bindValue(':id', $advertisement->getId());
        $stmt->bindValue(':title', $advertisement->getTitle());
        $stmt->bindValue(':content', $advertisement->getContent());
        $stmt->bindValue(':url', $advertisement->getURL());
        $stmt->bindValue(':administrator', $advertisement->getUserAdmin());
        $stmt->bindValue(':image', $advertisement->getImage());
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
            SELECT advertisement.id, advertisement.title, advertisement.content, advertisement.url, advertisement.administrator, "user".email AS administratorEmail, advertisement.image
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

    /**
     * @access public
     * @return int
     * @ReturnType Advertisement[]
     */
    public function getAdvertisementsByUser($userId) {
        $stmt = $this->pdoInstance->prepare('SELECT * FROM "advertisement" WHERE administrator = :user_id');
        $stmt->bindValue(':user_id', $userId);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
