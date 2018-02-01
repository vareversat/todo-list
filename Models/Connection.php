<?php

class Connection extends PDO
{
    private $stmt;

    /**
     * Connection constructor.
     *
     * @param $dsn string connection string
     * @param $username string username for the database
     * @param $passwd string password of the specified username
     */
    public function __construct($dsn, $username, $passwd){
        parent::__construct($dsn, $username, $passwd);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Execute a query with the specified database system
     *
     * @param $query string
     * @param array $param parameters of the query if needed
     * @return bool true if succeeded
     */
    public function executeQuery($query, array $param = []) : bool {
        $this->stmt = parent::prepare($query);

        foreach ($param as $name => $value){
            $this->stmt->bindValue($name, $value[0], $value[1]);
        }

        return $this->stmt->execute();
    }

    /**
     * Get last row id inserted in the database
     *
     * @return string return last row id
     */
    public function getLastRowIdInserted(){
        return $this->lastInsertId();
    }

    /**
     * Return the result of the query
     *
     * @return mixed result of the query
     */
    public function getResults(){
        return $this->stmt->fetchall();
    }
}