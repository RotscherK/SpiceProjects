<?php

namespace dao;

use domain\Course;

/**
 * @access public
 * @author roger.kaufmann
 */
class CourseDAO extends BasicDAO {

	/**
	 * @access public
	 * @param Course course
	 * @return Course
	 * @ParamType course Course
	 * @ReturnType Course
	 */
	public function create(Course $course) {
        $stmt = $this->pdoInstance->prepare('
            INSERT INTO course (name, description, price, expiration_date, requirements, university_id)
            VALUES (:name, :description, :price, :expiration_date, :requirements, :university_id)');
        $stmt->bindValue(':name', $course->getName());
        $stmt->bindValue(':description', $course->getDescription());
        $stmt->bindValue(':price', $course->getPrice());
        $stmt->bindValue(':expiration_date', $course->getExpirationDate());
        $stmt->bindValue(':requirements', $course->getRequirement());
        $stmt->bindValue(':university_id', $course->getUniversityId());
        $stmt->execute();
        return $this->read($this->pdoInstance->lastInsertId());
	}

	/**
	 * @access public
	 * @param int courseId
	 * @return Course
	 * @ParamType courseId int
	 * @ReturnType Course
	 */
	public function read($courseId) {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM course WHERE id = :id;');
        $stmt->bindValue(':id', $courseId);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Course")[0];
        }
        return null;
	}

	/**
	 * @access public
	 * @param Course course
	 * @return Course
	 * @ParamType course Course
	 * @ReturnType Course
	 */
	public function update(Course $course) {
        $stmt = $this->pdoInstance->prepare('
            UPDATE customer SET name = :name,
                description = :description,
                price = :price,
                expiration_date = :expiration_date,
                requirements = :requirements,
                university_id = :university_id,
            WHERE id = :id');
        $stmt->bindValue(':name', $course->getName());
        $stmt->bindValue(':description', $course->getDescription());
        $stmt->bindValue(':price', $course->getPrice());
        $stmt->bindValue(':expiration_date', $course->getExpirationDate());
        $stmt->bindValue(':requirements', $course->getRequirement());
        $stmt->bindValue(':university_id', $course->getUniversityId());
        $stmt->bindValue(':id', $course->getId());
        $stmt->execute();
        return $this->read($course->getId());
	}

	/**
	 * @access public
	 * @param Course course
	 * @ParamType course Course
	 */
	public function delete(Course $course) {
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM course
            WHERE id = :id
        ');
        $stmt->bindValue(':id', $course->getId());
        $stmt->execute();
	}

	/**
	 * @access public
	 * @return Course[]
	 * @ReturnType Course[]
	 */
	public function getAllCourses() {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM course ORDER BY id;');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Course");
	}
}
?>