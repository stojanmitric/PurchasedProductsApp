<?php

namespace CustomsControlSM\db;

interface IUserCRUD {

	public function create();

	public function update();

	public function delete();

	public function listAll();

}

?>