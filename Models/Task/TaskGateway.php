<?php

require_once (__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Models".DIRECTORY_SEPARATOR."Autoloader.php");

class TaskGateway{

    private $connection;
    private $data;

    /**
     * TaskGateway constructor.
     * @throws Exception
     */
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
     * Get all the tasks linked to the id of a list of tasks
     *
     * @param $listId int The id of the taskList
     * @return array The array of all tasks contains in this taskList
     */
    public function getTasksOfTaskListById($listId) : array{
        $query = "SELECT task.taskID,  task.content, task.date, task.isComplete 
                  from task, listoftasks, hastasks 
                  where listoftasks.listID = ? AND hastasks.listID = listoftasks.listID AND hastasks.taskID = task.taskID";

        $param = array(1 => array($listId, PDO::PARAM_STR));

        $this->connection->executeQuery($query, $param);
        $tabQueryResult = $this->connection->getResults();

        $tabTasks = array();

        foreach ($tabQueryResult as $value){
            $taskId = $value['taskID'];
            $content = $value['content'];
            $date = $value['date'];
            $isComplete = $value['isComplete'];

            $tabTasks[] = new Task($taskId, $date, $content, $isComplete);
        }

        return $tabTasks;
    }

    /**
     * Add a new task to a list of task
     *
     * @param $content string content of the task
     * @param $date string when the task is created
     * @param $taskListId int id of the list of task it is linked to
     */
    public function createNewTask($content, $date, $taskListId){
        $query = "INSERT INTO task VALUES (NULL , ?, ?, '0')";
        $param = array(1 => array($date, PDO::PARAM_STR),
            2 => array($content, PDO::PARAM_STR));

        $this->connection->executeQuery($query, $param);
        $taskId = $this->connection->getLastRowIdInserted();

        $query2 = "INSERT INTO hastasks VALUES (?, ?)";
        $param2 = array(1 => array($taskListId, PDO::PARAM_STR),
            2 => array($taskId, PDO::PARAM_STR));

        $this->connection->executeQuery($query2, $param2);
    }

    /**
     * Remove a task from a list of tasks
     *
     * @param $taskId int id of the task to remove
     */
    public function deleteTaskByTaskId($taskId){
        $query = "DELETE FROM hastasks WHERE taskID = ?";
        $param = $param = array(1 => array($taskId, PDO::PARAM_STR));

        $this->connection->executeQuery($query, $param);

        $query = "DELETE FROM task WHERE taskID = ?";
        $param = $param = array(1 => array($taskId, PDO::PARAM_STR));

        $this->connection->executeQuery($query, $param);
    }

    /**
     * Mark a task as completed
     *
     * @param $taskId int id of the task to mark completed
     */
    public function markTaskAsComplete($taskId)
    {
        $query = "UPDATE task SET isComplete = '1' WHERE taskID = ?";
        $param = $param = array(1 => array($taskId, PDO::PARAM_STR));

        $this->connection->executeQuery($query, $param);
    }
}