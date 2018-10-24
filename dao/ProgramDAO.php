<?php

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
            INSERT INTO program (name, description, price, expiration_date, requirements, university_id)
            VALUES (:name, :description, :price, :expiration_date, :requirements, :university_id)');
        $stmt->bindValue(':name', $program->getName());
        $stmt->bindValue(':description', $program->getDescription());
        $stmt->bindValue(':price', $program->getPrice());
        $stmt->bindValue(':expiration_date', $program->getExpirationDate());
        $stmt->bindValue(':requirements', $program->getRequirement());
        $stmt->bindValue(':university_id', $program->getUniversityId());
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
            SELECT * FROM program WHERE id = :id;');
        $stmt->bindValue(':id', $programId);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Program")[0];
        }
        return null;
	}

	/**
	 * @access public
	 * @param Program program
	 * @return Program
	 * @ParamType program Program
	 * @ReturnType Program
	 */
	public function update(Program $program) {
        $stmt = $this->pdoInstance->prepare('
            UPDATE customer SET name = :name,
                description = :description,
                price = :price,
                expiration_date = :expiration_date,
                requirements = :requirements,
                university_id = :university_id,
            WHERE id = :id');
        $stmt->bindValue(':name', $program->getName());
        $stmt->bindValue(':description', $program->getDescription());
        $stmt->bindValue(':price', $program->getPrice());
        $stmt->bindValue(':expiration_date', $program->getExpirationDate());
        $stmt->bindValue(':requirements', $program->getRequirement());
        $stmt->bindValue(':university_id', $program->getUniversityId());
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
            DELETE FROM program
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
            SELECT * FROM program ORDER BY id;');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Program");
	}
}
?>