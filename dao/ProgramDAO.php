<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 22.10.2018
 * Time: 21:48
 */

namespace dao;

use domain\Program;

/**
 * @access public
 * @author roger.kaufmann
 */
class ProgramDAO extends BasicDAO {

	/**
	 * @access public
	 * @param Program program
	 * @return Program
	 * @ParamType program Program
	 * @ReturnType Program
	 */
	public function create(Program $program) {
        $stmt = $this->pdoInstance->prepare('
            INSERT INTO "program" (name,type,category_id,distance_learning,degree,price,duration,description,requirements,url,expiration,provider_id)
            VALUES (:name,:type,:category_id,:distance_learning,:degree,:price,:duration,:description,:requirements,:url,:expiration,:provider_id)');

        $stmt->bindValue(':name', $program->getName());
        $stmt->bindValue(':type', $program->getType());
        $stmt->bindValue(':category_id', $program->getCategoryId());
        $stmt->bindValue(':distance_learning', (($program->getDistanceLearning()) ? 'true' : 'false'));
        $stmt->bindValue(':degree', $program->getDegree());
        $stmt->bindValue(':price', strval($program->getPrice()));
        $stmt->bindValue(':duration', $program->getDuration());
        $stmt->bindValue(':description', $program->getDescription());
        $stmt->bindValue(':requirements', $program->getRequirement());
        $stmt->bindValue(':url', $program->getUrl());
        $stmt->bindValue(':expiration',  $program->getExpiration());
        $stmt->bindValue(':provider_id', $program->getProviderId());
        $stmt->execute();
        return $this->read($this->pdoInstance->lastInsertId());
	}

	/**
	 * @access public
	 * @param int programId
	 * @return Program
	 * @ParamType programId int
	 * @ReturnType Program
	 */
	public function read($programId) {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM "program" WHERE id = :id;');
        $stmt->bindValue(':id', $programId);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Program")[0];
        }
        return null;
	}

	/**
	 * @access public
	 * @param program Program
	 * @return Program
	 * @ParamType program Program
	 * @ReturnType Program
	 */
	public function update(Program $program) {
        $stmt = $this->pdoInstance->prepare('
            UPDATE "program" SET name = :name,
                type = :type,
                category_id = :category_id,
                distance_learning = :distance_learning,
                degree = :degree,
                price = :price,
                duration = :duration,
                description = :description,
                requirements = :requirements,
                url = :url,
                expiration = :expiration,
                provider_id = :provider_id
            WHERE id = :id');
        $stmt->bindValue(':name', $program->getName());
        $stmt->bindValue(':type', $program->getType());
        $stmt->bindValue(':category_id', $program->getCategoryId());
        $stmt->bindValue(':distance_learning', (($program->getDistanceLearning()) ? 'true' : 'false'));
        $stmt->bindValue(':degree', $program->getDegree());
        $stmt->bindValue(':price', strval($program->getPrice()));
        $stmt->bindValue(':duration', $program->getDuration());
        $stmt->bindValue(':description', $program->getDescription());
        $stmt->bindValue(':requirements', $program->getRequirement());
        $stmt->bindValue(':url', $program->getUrl());
        $stmt->bindValue(':expiration',  $program->getExpiration());
        $stmt->bindValue(':provider_id', $program->getProviderId());
        $stmt->bindValue(':id', $program->getId());
        $stmt->execute();
        return $this->read($program->getId());
	}

	/**
	 * @access public
	 * @param Program program
	 * @ParamType program Program
	 */
	public function delete(Program $program) {
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM "program"
            WHERE id = :id
        ');
        $stmt->bindValue(':id', $program->getId());
        $stmt->execute();
	}

	/**
	 * @access public
	 * @return Program[]
	 * @ReturnType Program[]
	 */
	public function getAllPrograms() {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM "program" ORDER BY id;');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Program");
	}
}
?>