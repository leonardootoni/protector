<?php
/**
 * User Model
 * Author: Leonardo Otoni
 */
class user
{
    /**
     * Default constructor
     */
    public function __construct()
    {
    }

    /**
     * Save a new user into the USER table.
     * The database table has constraints to avoid email duplicity
     */
    public function registerUser($email, $firstName, $lastName, $hash, $birthday)
    {
        if (empty($email) || empty($firstName) || empty($lastName) || empty($hash) || empty($birthday)) {
            throw new Exception(constants::USER_REGISTER_DATA_EXCEPTION);
        }

        $db = database::getConnection();
        $query = "insert into USER (EMAIL, FIRST_NAME, LAST_NAME, PASSWORD, BIRTHDAY, BLOCKED, RECORD_CREATION) " .
            "values(:email, :firstName, :lastName, :password, :birthday, :blocked, :recordCreation )";

        $statement = $db->prepare($query);
        $statement->bindValue(":email", $email);
        $statement->bindValue(":firstName", $firstName);
        $statement->bindValue(":lastName", $lastName);
        $statement->bindValue(":password", $hash);
        $statement->bindValue(":birthday", date("Y-m-d"));
        $statement->bindValue(":blocked", "N");
        $statement->bindValue(":recordCreation", date("Y-m-d"));

        try {
            $statement->execute();
        } catch (Excetion $e) {
            throw new Exception($e->getMessage());
        } finally {
            $statement->closeCursor();
        }

    }

    /**
     * Authenticate a user matched by the hash. If a user is valid, return a user data
     */
    public function authenticateUser($email, $hash)
    {
        if (empty($email) || empty($hash)) {
            throw new Exception(constants::USER_AUTHENTICATION_EXCEPTION);
        }

        $userData = $this->getUserPasswordFromDB($email);
        $hashFromDB = $userData["password"];
        unset($userData['password']);
        $isAuthenticated = (isset($hashFromDB) && ($hashFromDB == $hash)) ? true : false;
        if ($isAuthenticated) {
            return $userData;
        } else {
            throw new Exception(constants::INVALID_USER_PASSWORD_EXCEPTION);
        }
    }

    /**
     * Get a user through a given email.
     */
    public function getUserPasswordFromDB($email)
    {
        $query = "select id, first_name, password from user where email = :email and blocked='N'";
        $db = database::getConnection();
        $statement = $db->prepare($query);
        $statement->bindValue(":email", $email);

        try {
            $statement->execute();
            if ($statement->rowCount() == 1) {
                $resultSet = $statement->fetch();
                $userArray = array(
                    "userId" => $resultSet["id"],
                    "firstName" => $resultSet["first_name"],
                    "password" => $resultSet["password"],
                );
                return $userArray;

            } else {
                throw new Exception(constants::USER_NOT_FOUND_EXCEPTION);
            }

        } catch (PDOException $e) {
            throw $e->getMessage();
        } finally {
            $statement->closeCursor();
        }

    }

}
