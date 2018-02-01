<?php

require_once (__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Models".DIRECTORY_SEPARATOR."Autoloader.php");


class FrontController{

    private $errorView = __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Views".DIRECTORY_SEPARATOR."ErrorView.php";
    private $logView = __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Views".DIRECTORY_SEPARATOR."LogView.php";
    private $addingTaskListView = __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Views".DIRECTORY_SEPARATOR."AddingTaskListView.php";
    private $addingTaskView = __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Views".DIRECTORY_SEPARATOR."AddingTaskView.php";
    private $registerView = __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Views".DIRECTORY_SEPARATOR."RegisterView.php";

    /**
     * Controller's constructor.
     * @internal param $taskModel
     * @internal param $userModel
     */
    public function __construct()
    {
        session_start();

        $taskActions = array("addNewTask", "deleteTask", "viewTaskList");
        $taskListAction = array("connection", "comeBack", "addNewTaskList", "deleteTaskList");
        $userAction = array("connection", "disconnection");

        try{
            $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "NULL";

            switch ($action){
                case "connection":
                    new UserController();
                    new TaskListController();
                    break;

                case "disconnection":
                    new UserController();
                    break;

                case "comeBack":
                    new TaskListController();
                    break;

                case "addNewTaskList":
                    new TaskListController();
                    break;

                case "deleteTaskList":
                    new TaskListController();
                    break;

                case "addNewTask":
                    new TaskController();
                    break;

                case "deleteTask":
                    new TaskController();
                    break;

                case "viewTaskList":
                    new TaskController();
                    break;

                case "completeTask":
                    new TaskController();
                    break;

                case "addingTaskListView":
                    $this->addingTaskListView();
                    break;

                case "addingTaskView":
                    $this->addingTaskView();
                    break;

                case "createNewUser":
                    new UserController();
                    include ($this->logView);
                    break;

                case "registerView":
                    include ($this->registerView);
                    break;


                case "NULL":
                    include ($this->logView);
                    break;

                default:
                    $dataViewError[] = "PHP call error. ".$action;

                    include ($this->errorView);
                    break;

            }
        }
        catch (Exception $e){
            $dataViewError[] = $e->getMessage();

            include ($this->errorView);
        }
    }

    private function addingTaskListView(){
        $login = Validation::validateString($_SESSION['login']);
        include ($this->addingTaskListView);
    }


    private function addingTaskView(){
        $login = Validation::validateString($_SESSION['login']);
        $title = Validation::validateString($_REQUEST['taskListName']);
        $taskListId = Validation::validateString($_REQUEST['taskListId']);
        include ($this->addingTaskView);
    }

}