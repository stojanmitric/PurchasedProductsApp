<?php

require "../../../bootstrap/bootstrap.php";

class User
{


    private $name;
    private $email;
    private $userName;
    private $password;

    private $db;

    public function __construct()
    {

        $db = ACTIVE_DB;

        $this->db = $db;

    }

    public function createUser($name, $email, $userName, $password)
    {
        $this->db->create($name, $email, $userName, $password);
    }

    public function updateUser()
    {
        $this->db->update();
    }

    public function deleteUser()
    {
        $this->db->delete();
    }

    public function listUsers()
    {
        $this->db->listAll();
    }


}

?>