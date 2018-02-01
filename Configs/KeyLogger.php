<?php

/**
 * KeyLogger contains the credentials required by PDO to access the database of Tasks
 */
final class KeyLogger
{
    static private $connectionString = "mysql:host=localhost;dbname=projetphp";
    static private $username = "root";
    static private $password = "";

    private function __construct() {}

    /**
     * Get the connectionString required by PDO
     *
     * @return string connectionString
     */
    final static function getConnectionString(): string
    {
        return self::$connectionString;
    }

    /**
     * Get the username required by PDO
     *
     * @return string username
     */
    final static function getUsername(): string
    {
        return self::$username;
    }

    /**
     * Get the password required by PDO
     *
     * @return string password
     */
    final static function getPassword(): string
    {
        return self::$password;
    }
}