<?php

namespace CustomsControlSM\db;

interface IUserCRUD
{

    public function create($name, $email, $username, $password);

    public function update($name, $email, $username, $password);

    public function delete($id);

    public function listAll();

}

?>