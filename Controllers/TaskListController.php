<?php

require_once (__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Models".DIRECTORY_SEPARATOR."Autoloader.php");

class TaskListController{

    private $taskModel;
    private $mainView = __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Views".DIRECTORY_SEPARATOR."MainView.php";
    private $logView = __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Views".DIRECTORY_SEPARATOR."LogView.php";
    private $addingView = __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Views".DIRECTORY_SEPARATOR."AddingTaskListView.php";

    /**
     * Controller constructor.
     * @internal param $taskModel
     * @internal param $userModel
     */
    public function __construct()
    {
        try{
            $this->taskModel = new TaskListModel();

            $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "NULL";

            switch ($action){

                case "connection":
                    $this->connexion();
                    break;

                case "addingTaskListView":
                    $login = Validation::validateString($_SESSION['login']);
                    include ($this->addingView);
                    break;

                case "addNewTaskList":
                    $this->addNewTaskList();
                    break;

                case "deleteTaskList":
                    $this->deleteTaskList();
                    break;


                case "comeBack":
                    $this->comeBack();
                    break;

            }
        }
        catch (Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    private function connexion(){
        $login = Validation::validateString($_SESSION['login']);
        if($login != "public") {
            $taskLists = $this->taskModel->getTaskListsByUserId(Validation::validateString($_SESSION['id']));
        }
        else{
            $taskLists = $this->taskModel->getPublicTaskLists();
        }
        $loginString = "LOGGED AS"." ".$login;
        include ($this->mainView);
    }

    private function addNewTaskList(){
        $taskLists = $this->taskModel->createNewTaskList(Validation::validateString($_REQUEST['title']),
            Validation::validateDate($_REQUEST['date']),
            Validation::validateString($_REQUEST['isPublic']),
            Validation::validateString($_SESSION['login']));

        $login = Validation::validateString($_SESSION['login']);

        $loginString = "LOGGED AS"." ".$login;
        include ($this->mainView);
    }


    private function deleteTaskList(){
        $taskLists = $this->taskModel->deleteTaskListByTaskListId(Validation::validateString($_REQUEST['taskListId']), Validation::validateString($_SESSION['login']));
        $this->connexion();

    }

    private function comeBack(){
        $login = isset($_SESSION['login']) ? $_SESSION['login'] : "NULL";
        if($login != "NULL") {
            $loginString = "LOGGED AS"." ".Validation::validateString($_SESSION['login']);

            if($login != "public"){
                $taskLists = $taskLists = $this->taskModel->getTaskListsByUserId(Validation::validateString($_SESSION['id']));
            }
            else{
                $taskLists = $this->taskModel->getPublicTaskLists();
            }

            include($this->mainView);
        }
        else{
            include ($this->logView);
        }
    }
}