<?php

require_once (__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Models".DIRECTORY_SEPARATOR."Autoloader.php");

class UserModel{

    private $gateway;

    /**
     * TaskModel constructor.
     * @throws Exception
     */
    public function __construct(){
        try {
            $this->gateway = new UserGateway();
        }
        catch (Exception $e){
            throw new Exception("Cannot reach the user gateway");
        }
    }

    /**
     * Connect the user to the application
     *
     * @param $login string user's name
     */
    public function connection($login){
        if($login != "public"){
            if ($id = $this->gateway->getRelatedUser($login, Validation::validatePWD($_REQUEST['pwd'])))
                $_SESSION['login'] = $login;
                $_SESSION['id'] = $id;
        }
        else{
            $_SESSION['login'] = 'public';
        }
    }

    /**
     * Create a new user
     *
     * @param $userName string user's name
     * @param $password string user's password
     * @param $repeatedPassword string user's password repetition to make sure it is correct
     * @throws Exception whenever the password doesn't match
     */
    public function createNewUser($userName, $password, $repeatedPassword){
        if(strcmp($password, $repeatedPassword) != 0){
            throw new Exception("Password don't match !");
        }
        else {
            $this->gateway->createNewUser($userName, $password);
        }
    }

    /**
     * Disconnect the user by destroying its session
     */
    public function disconnection(){
        session_unset();
        session_destroy();
        $_SESSION = array();
    }
}