<?php

require_once (__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Models".DIRECTORY_SEPARATOR."Autoloader.php");

class TaskModel{

    private $gateway;

    /**
     * TaskModel constructor.
     * @throws Exception
     */
    public function __construct(){
        try {
            $this->gateway = new TaskGateway();
        }
        catch (Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Get all the tasks linked to the id of a list of tasks
     *
     * @param $listId int The id of the taskList
     * @return array The array of all tasks contains in this taskList
     */
    public function getTasksOfTaskListById($listId) : array {
        return  $this->gateway->getTasksOfTaskListById($listId);
    }

    /**
     * Add a new task to a list of task
     *
     * @param $title string content of the task
     * @param $date string when the task is created
     * @param $taskListId int id of the list of task it is linked to
     * @return array the actualised tasks of the task list id
     */
    public function createNewTask($title, $date, $taskListId) : array {
        $date = DateTime::createFromFormat('j/m/Y', $date);
        $date = $date->format('Y-m-d');

        $this->gateway->createNewTask($title, $date, $taskListId);

        return $this->getTasksOfTaskListById($taskListId);
    }


    /**
     * Remove a task from a list of tasks
     *
     * @param $taskId int id of the task to remove
     * @param $taskListId int id of task list to return
     * @return array the actualised tasks of the task list id
     */
    public function deleteTaskByTaskId($taskId, $taskListId) : array {
        $this->gateway->deleteTaskByTaskId($taskId);
        return $this->getTasksOfTaskListById($taskListId);
    }

    /**
     * Mark a task as completed
     *
     * @param $taskId int id of the task to mark completed
     * @param $taskListId int id of task list to return
     * @return array the actualised tasks of the task list id
     */
    public function markTaskAsComplete($taskId, $taskListId) : array{
        $this->gateway->markTaskAsComplete($taskId);
        return $this->getTasksOfTaskListById($taskListId);
    }
}