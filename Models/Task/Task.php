<?php

class Task
{
    private $task_id;    //Unique ID of the Task
    private $date;       //When the task has been created
    private $content;    //Purpose of the task
    private $isComplete; //Is the task completed ?

    /**
     * Task constructor.
     * @param int $task_id
     * @param string $date
     * @param string $content
     * @param int $isComplete
     */
    public function __construct($task_id, $date, $content, $isComplete)
    {
        $this->task_id = $task_id;
        $this->date = $date;
        $this->content = $content;
        $this->isComplete = $isComplete;
    }

    /**
     * @return int
     */
    public function getTaskId()
    {
        return $this->task_id;
    }

    /**
     * @param int $task_id
     */
    public function setTaskId($task_id)
    {
        $this->task_id = $task_id;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return int
     */
    public function getIsComplete()
    {
        return $this->isComplete;
    }

    /**
     * @param int $isComplete
     */
    public function setIsComplete($isComplete): void
    {
        $this->isComplete = $isComplete;
    }

    public function __toString()
    {
        return $this->task_id." ".$this->date." ".$this->content;
    }


}