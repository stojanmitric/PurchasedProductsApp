<?php

namespace CustomsControlSM\db;

class UserMySqlCRUD implements IUserCRUD
{

    public $db;

    public function __construct()
    {

        $db = ACTIVE_DB;

        $this->db = $db;
    }

    public function create($name, $email, $username, $password)
    {

        $crestmt = $this->db->prepare("INSERT INTO users (name, email, username, password) VALUES (:name, :email, :username, :password)");

        $crestmt->bindParam(':name', $name);
        $crestmt->bindParam(':email', $email);
        $crestmt->bindParam(':username', $username);
        $crestmt->bindParam(':password', $password);

        $crestmt->execute();
    }

    public function update($name, $email, $username, $password)
    {
        $updstmt = $this->db->prepare("UPDATE users SET name=$name, email=$email, username=$username, password=$password  where id='$id'");
        $updstmt->execute();
    }

    public function delete($id)
    {
        $delstmt = $this->db->prepare("DELETE FROM users where id='$id'");
        $delstmt->execute();
    }

    public function listAll()
    {
        $selstmt = $this->db->prepare("SELECT * FROM users");
        $selstmt->execute();
    }
}

?>