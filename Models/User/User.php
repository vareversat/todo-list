<?php

class User
{
    private $user_id;  //Unique id of the user
    private $name;     //Name and pseudo to log-in
    private $password; //Password (encrypted by PHP)

    public function __construct($user_id, $name, $password)
    {
        $this->user_id = $user_id;
        $this->name = $name;
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
}