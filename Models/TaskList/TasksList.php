<?php

class TasksList{

    private $id;       //Unique id of the list of tasks
    private $userId;   //Unique id of the user who created this list
    private $title;    //Title of the list
    private $date;     //Date of creation of the list
    private $isPublic; //Whether of not the list is public

    /**
     * TasksList constructor.
     * @param $id int
     * @param $userId int
     * @param $title string
     * @param $date string
     * @param $isPublic int
     */
    public function __construct($id, $userId, $title, $date, $isPublic)
    {
        $this->userId = $userId;
        $this->id = $id;
        $this->title = $title;
        $this->date = $date;
        $this->isPublic = $isPublic;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
     * @return int
     */
    public function getIsPublic()
    {
        return $this->isPublic;
    }

    /**
     * @param int $isPublic
     */
    public function setIsPublic($isPublic)
    {
        $this->isPublic = $isPublic;
    }
}