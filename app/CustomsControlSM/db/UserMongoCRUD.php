<?php

namespace CustomsControlSM\db;

class UserMongoCRUD implements IUserCRUD
{

    public $mongoCollection;

    public function __construct()
    {

        $mongoDB = ACTIVE_DB;

        $this->mongoCollection = $mongoDB->selectCollection('users');

    }


    public function create($name, $email, $username, $password)
    {

        $data = array(
            "name" => $name,
            "email" => $email,
            "username" => $username,
            "password" => $password
        );

        $this->mongoCollection->insertOne($data);
    }

    public function update($name, $email, $username, $password)
    {
        $this->mongoCollection->updateOne(array('name' => $name),
            array('$set' => array('name' => $name), array('email' => $name), array('username' => $username), array('password' => $password))
        );

    }

    public function delete($id)
    {

        $remaining = $this->mongoCollection->count(array('id' => $id));

        while ($remaining > 0) {
            $this->mongoCollection->remove(array("id" => $id), array("justOne" => true));
            $remaining--;
        }

    }

    public function listAll()
    {
        $allRecords = $this->mongoCollection->find();
        return $allRecords;

    }
}

?>