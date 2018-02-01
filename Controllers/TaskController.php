<?php

require_once (__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Models".DIRECTORY_SEPARATOR."Autoloader.php");


class TaskController{

    private $taskModel;
    private $mainView = __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Views".DIRECTORY_SEPARATOR."MainView.php";
    private $errorView = __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Views".DIRECTORY_SEPARATOR."ErrorView.php";
    private $logView = __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Views".DIRECTORY_SEPARATOR."LogView.php";
    private $showingView = __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Views".DIRECTORY_SEPARATOR."TaskShowingView.php";
    private $addingView = __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Views".DIRECTORY_SEPARATOR."AddingTaskView.php";

    /**
     * Controller constructor.
     * @internal param $taskModel
     * @internal param $userModel
     */
    public function __construct()
    {
        try{
            $this->taskModel = new TaskModel();

            $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "NULL";

            switch ($action){

                case "viewTaskList":
                    $this->viewTaskList();
                    break;

                case "addNewTask":
                    $this->addNewTask();
                    break;


                case "deleteTask":
                    $this->deleteTask();
                    break;

                case "completeTask":
                    $this->completeTask();
                    break;

            }
        }
        catch (Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    private function viewTaskList(){
        $tasks = $this->taskModel->getTasksOfTaskListById(Validation::validateString($_REQUEST['taskListId']));
        $loginString = "LOGGED AS"." ".Validation::validateString($_SESSION['login']);
        $taskListId = Validation::validateString($_REQUEST['taskListId']);
        $title = Validation::validateString($_REQUEST['taskListName']);
        include ($this->showingView);
    }

    private function addNewTask(){
        $tasks = $this->taskModel->createNewTask(Validation::validateString($_REQUEST['content']),
            Validation::validateDate($_REQUEST['date']),
            Validation::validateString(($_REQUEST['taskListId'])));
        $loginString = "LOGGED AS"." ".Validation::validateString($_SESSION['login']);
        $taskListId = Validation::validateString($_REQUEST['taskListId']);
        $title = Validation::validateString($_REQUEST['taskListName']);
        include ($this->showingView);
    }

    private function deleteTask(){
        $tasks = $this->taskModel->deleteTaskByTaskId(Validation::validateString($_REQUEST['taskId']), Validation::validateString($_REQUEST['taskListId']));
        $loginString = "LOGGED AS"." ".Validation::validateString($_SESSION['login']);
        $taskListId = Validation::validateString($_REQUEST['taskListId']);
        $title = Validation::validateString($_REQUEST['taskListName']);
        include ($this->showingView);

    }

    private function completeTask(){
        $tasks = $this->taskModel->markTaskAsComplete(Validation::validateString($_REQUEST['taskId']), Validation::validateString($_REQUEST['taskListId']));
        $loginString = "LOGGED AS"." ".Validation::validateString($_SESSION['login']);
        $taskListId = Validation::validateString($_REQUEST['taskListId']);
        $title = Validation::validateString($_REQUEST['taskListName']);
        include ($this->showingView);

    }


}