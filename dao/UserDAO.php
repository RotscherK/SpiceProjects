<?php

namespace dao;

use domain\User;

/**
 * @access public
 * @author roger.kaufmann
 */
class UserDAO extends BasicDAO {

	/**
	 * @access public
	 * @param User user
	 * @return User
	 * @ParamType user User
	 * @ReturnType User
	 */
	public function create(User $user) {
        $stmt = $this->pdoInstance->prepare('
        INSERT INTO "user" (lastname, firstname, email, password, admin, provider_admin, ad_admin)
          SELECT :lastname,:firstname,:email,:password,:siteAdmin,:providerAdmin,:adAdmin
          WHERE NOT EXISTS (
            SELECT email FROM user WHERE email = :emailExist
        );');
        $stmt->bindValue(':lastname', $user->getLastname());
        $stmt->bindValue(':firstname', $user->getFirstname());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':emailExist', $user->getEmail());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->bindValue(':siteAdmin', $user->getSiteAdmin());
        $stmt->bindValue(':providerAdmin', $user->getProviderAdmin());
        $stmt->bindValue(':providerAdmin', $user->getAdAdmin());
        $stmt->execute();
        return $this->read($this->pdoInstance->lastInsertId());
	}

	/**
	 * @access public
	 * @param int userId
	 * @return User
	 * @ParamType userId int
	 * @ReturnType User
	 */
	public function read($userId) {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM "user" WHERE id = :id;');
        $stmt->bindValue(':id', $userId);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\User")[0];
        }
        return null;
    }

    /**
     * @access public
     * @param int userId
     * @return User
     * @ParamType userId int
     * @ReturnType User
     */
    public function readBasic($userId) {
        $stmt = $this->pdoInstance->prepare('
            SELECT id, lastname, firstname, email FROM "user" WHERE id = :id;');
        $stmt->bindValue(':id', $userId);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\User")[0];
        }
        return null;
    }

	/**
	 * @access public
	 * @param User user
	 * @return User
	 * @ParamType user User
	 * @ReturnType User
	 */
	public function update(User $user) {
        $stmt = $this->pdoInstance->prepare('
                UPDATE "user" SET lastname=:lastname, firstname=:firstname, email=:email, password=:password, admin=FALSE, provider_admin=:providerAdmin, ad_admin=:adAdmin WHERE id = :id;');
        $stmt->bindValue(':id', $user->getId());
        $stmt->bindValue(':lastname', $user->getLastname());
        $stmt->bindValue(':firstname', $user->getFirstname());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':password', $user->getPassword());
        //$stmt->bindValue(':siteAdmin', $user->getSiteAdmin());
        $stmt->bindValue(':providerAdmin', $user->getProviderAdmin());
        $stmt->bindValue(':adAdmin', $user->getAdAdmin());
        $stmt->execute();
        return $this->read($user->getId());
	}

	/**
	 * @access public
	 * @param String email
	 * @return User
	 * @ParamType email String
	 * @ReturnType User
	 */
    public function findByEmail($email)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM "user" WHERE email = :email;');
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\User")[0];
        }
        return null;
    }

    /**
     * @access public
     * @return User[]
     * @ReturnType User[]
     */
    public function getAllUsers() {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM "user" ORDER BY id;');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\User");
    }
}

