<?php

require_once (__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Models".DIRECTORY_SEPARATOR."Autoloader.php");

class UserController{

    private $logView = __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Views".DIRECTORY_SEPARATOR."LogView.php";

    private $userModel;

    /**
     * Controller constructor.
     * @internal param $taskModel
     * @internal param $userModel
     */
    public function __construct()
    {
        try{
            $this->userModel = new UserModel();

            $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "NULL";

            switch ($action){

                case "connection":
                    $this->userModel->connection(Validation::validateString($_REQUEST['login']));
                    break;

                case "disconnection":
                    $this->userModel->disconnection();
                    include ($this->logView);
                    break;

                case "createNewUser":
                    $this->userModel->createNewUser(Validation::validateString($_REQUEST['userId']), Validation::validatePWD($_REQUEST['password']), Validation::validatePWD($_REQUEST['repeatedPassword']));
            }
        }
        catch (Exception $e){
            throw new Exception($e->getMessage());
        }
    }
}