<?php
/**
 * Created by PhpStorm.
 * User: vareversat1
 * Date: 28/11/17
 * Time: 14:41
 */

require_once (__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Models".DIRECTORY_SEPARATOR."Autoloader.php");

class TaskListModel{

    private $gateway;

    /**
     * TaskModel constructor.
     * @throws Exception
     */
    public function __construct(){
        try {
            $this->gateway = new TaskListGateway();
        }
        catch (Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Get all public tasks list
     *
     * @return array The array of the public task lists
     */
    public function getPublicTaskLists(){
        return $this->gateway->getPublicTaskLists();
    }

    public function getTaskListsByUserId($id){
        return $this->gateway->getTaskListsByUserId($id);
    }

    /**
     * Create a new tasks list
     *
     * @param $title string title of the list of tasks
     * @param $date string date of creation
     * @param $isPublic int state of the list (public or private)
     * @param $userId int id of the user who creates this list
     * @return array public list of tasks or user's ones
     */
    public function createNewTaskList($title, $date, $isPublic, $userId) : array {
        if($userId == 'public')
            $userId = 'NULL';
        else
            $userId = Validation::validateString($_SESSION['id']);

        $isPublic = ($isPublic == "yes") ? 1 : 0;

        $date = DateTime::createFromFormat('j/m/Y', $date);
        $date = $date->format('Y-m-d');

        $this->gateway->createNewTaskList($title, $date, $isPublic, $userId);

        if ($userId != "public")
            return $this->getTaskListsByUserId($userId);

        return $this->getPublicTaskLists();
    }

    /**
     * Delete a list of tasks by id
     *
     * @param $taskListId int id of the task list we want to delete
     * @param $userId int id of the user
     * @return array public list of tasks or user's ones
     */
    public function deleteTaskListByTaskListId($taskListId, $userId) : array {
        $this->gateway->deleteTaskListByTaskListId($taskListId);

        if ($userId != "public")
            return $this->getTaskListsByUserId($userId);

        return $this->getPublicTaskLists();
    }
}