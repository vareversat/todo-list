<?php

require_once (__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Models".DIRECTORY_SEPARATOR."Autoloader.php");

class UserGateway
{
    private $user;
    private $connection;


    public function __construct()
    {
        try{
            $connection = new Connection(KeyLogger::getConnectionString(), KeyLogger::getUsername(),KeyLogger::getPassword());
            $this->connection = $connection;
        }
        catch (PDOException $pdoe){
            throw new Exception("Problème avec la base de données :"." ".$pdoe->getMessage());
        }
    }

    /**
     * Get the user related to the username and the password specified
     * @param $userName string username
     * @param $password string password to check
     * @return int user id if correct
     * @throws Exception whenever the id or the password isn't correct
     */
    public function getRelatedUser($userName, $password) : int {
        $query = 'SELECT userID FROM taskuser WHERE name = :userName AND password = :password';

        $this->connection->executeQuery($query, array(
            ':userName' => array($userName, PDO::PARAM_STR),
            ':password' => array(md5($password), PDO::PARAM_STR)
        ));

        $queryResult = $this->connection->getResults();

        if(empty($queryResult))
            throw new Exception("Invalid ID / PASSWORD");

        return $queryResult[0]['userID'];
    }

    /** Create a new user
     * @param $userName string username
     * @param $password string plaintext password
     */
    public function createNewUser($userName, $password){
        $query = 'INSERT INTO taskuser VALUES (NULL, ?, ?)';

        $this->connection->executeQuery($query, array(
            1 => array($userName, PDO::PARAM_STR),
            2 => array(md5($password), PDO::PARAM_STR)
        ));
    }
}