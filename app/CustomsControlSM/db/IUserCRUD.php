<?php

namespace CustomsControlSM\db;

interface IUserCRUD {

	public function create($user,$email,$username,$password);

	public function update($id, $user, $email, $username, $password);

	public function delete($id);

	public function listAll();

}

?>