<?php

require_once (__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."Models".DIRECTORY_SEPARATOR."Autoloader.php");

class TaskListGateway{

    private $connection;

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
     * @param $userId int The userID
     * @return array The array of task lists related to an user
     */
    public function getTaskListsByUserId($userId) : array {
        $query = "SELECT * FROM listoftasks WHERE userID = ? OR isPublic = '1'";
        $param = array(1 => array($userId, PDO::PARAM_STR));

        $this->connection->executeQuery($query, $param);
        $tabQueryResult = $this->connection->getResults();

        $tabResult = array();

        foreach ($tabQueryResult as $value){
            $userId = $value['userID'];
            $listID = $value['listID'];
            $title = $value['title'];
            $date = $value['date'];
            $isPublic = $value['isPublic'];

            $tabResult[] = new TasksList($listID, $userId, $title, $date, $isPublic);
        }

        return $tabResult;
    }

    /**
     * Get all public tasks list
     *
     * @return array The array of the public task lists
     */
    public function getPublicTaskLists() : array {
        $query = "SELECT * FROM listoftasks WHERE isPublic = ? OR userID IS NULL ";
        $param = array(1 => array('1', PDO::PARAM_STR));

        $this->connection->executeQuery($query, $param);
        $tabQueryResult = $this->connection->getResults();

        $tabResult = array();

        foreach ($tabQueryResult as $value){
            $userId = $value['userID'];
            $listID = $value['listID'];
            $title = $value['title'];
            $date = $value['date'];
            $isPublic = $value['isPublic'];

            $tabResult[] = new TasksList($listID, $userId, $title, $date, $isPublic);
        }

        return $tabResult;
    }

    /**
     * Create a new tasks list
     *
     * @param $title string title of the list of tasks
     * @param $date string date of creation
     * @param $isPublic int state of the list (public or private)
     * @param $userId int id of the user who creates this list
     */
    public function createNewTaskList($title, $date, $isPublic, $userId){
        if ($userId == 'NULL'){
            $query = "INSERT INTO listoftasks VALUES (NULL, NULL, ?, ?, ?)";
            $param = array(1 => array($title, PDO::PARAM_STR),
                2 => array($date, PDO::PARAM_STR),
                3 => array($isPublic, PDO::PARAM_STR));
        }
        else{
            $query = "INSERT INTO listoftasks VALUES (?, NULL, ?, ?, ?)";
            $param = array(1 => array($userId, PDO::PARAM_STR),
                2 => array($title, PDO::PARAM_STR),
                3 => array($date, PDO::PARAM_STR),
                4 => array($isPublic, PDO::PARAM_STR));
        }

        $this->connection->executeQuery($query, $param);
    }

    /**
     * Delete a list of tasks by id
     *
     * @param $taskListId int id of the task list we want to delete
     */
    public function deleteTaskListByTaskListId($taskListId){
        $query = "DELETE FROM hastasks WHERE listID = ?";
        $param = $param = array(1 => array($taskListId, PDO::PARAM_STR));

        $this->connection->executeQuery($query, $param);

        $query = "DELETE FROM listoftasks WHERE listID = ?";
        $param = $param = array(1 => array($taskListId, PDO::PARAM_STR));

        $this->connection->executeQuery($query, $param);
    }
}