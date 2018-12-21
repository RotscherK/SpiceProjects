<?php

namespace dao;

use domain\User;
use http\HTTPException;
use http\HTTPStatusCode;
use dao\ProviderDAO;
use dao\ProgramDAO;

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
            SELECT email FROM "user" WHERE email = :emailExist
        );');
        $stmt->bindValue(':lastname', $user->getLastname());
        $stmt->bindValue(':firstname', $user->getFirstname());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':emailExist', $user->getEmail());
        $stmt->bindValue(':password', password_hash($user->getPassword(), PASSWORD_DEFAULT));
        $stmt->bindValue(':siteAdmin', (($user->getAdmin())? 'true' : 'false'));
        $stmt->bindValue(':providerAdmin', (($user->getProviderAdmin())? 'true' : 'false'));
        $stmt->bindValue(':adAdmin', (($user->getAdAdmin())? 'true' : 'false'));
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
                UPDATE "user" SET lastname=:lastname, firstname=:firstname, email=:email, password=:password, admin=:siteAdmin, provider_admin=:providerAdmin, ad_admin=:adAdmin WHERE id = :id;');
        $stmt->bindValue(':id', $user->getId());
        $stmt->bindValue(':lastname', $user->getLastname());
        $stmt->bindValue(':firstname', $user->getFirstname());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':password', password_hash($user->getPassword(), PASSWORD_DEFAULT));
        $stmt->bindValue(':siteAdmin', (($user->getAdmin())? 'true' : 'false'));
        $stmt->bindValue(':providerAdmin', (($user->getProviderAdmin())? 'true' : 'false'));
        $stmt->bindValue(':adAdmin', (($user->getAdAdmin())? 'true' : 'false'));
        $stmt->execute();
        return $this->read($user->getId());
	}

	/**
	 * @access public
	 * @param String email
     * @return int
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
            return $stmt->rowCount();
        }
        return null;
    }

    /**
     * @access public
     * @param User user
     * @ParamType user User
     */
    public function delete(User $user)
    {
        if (((new ProviderDAO())->getProvidersByUser($user->getId())) > 0 || ((new AdvertisementDAO())->getAdvertisementsByUser($user->getId())) > 0) {
            throw new HTTPException(HTTPStatusCode::HTTP_403_FORBIDDEN);
        } else {
            $stmt = $this->pdoInstance->prepare('
            DELETE FROM "user"
            WHERE id = :id
        ');
            $stmt->bindValue(':id', $user->getId());
            $stmt->execute();
        }
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

