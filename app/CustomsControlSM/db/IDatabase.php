<?php

namespace CustomsControlSM\db;

interface IDatabase {

	public function create($user, $fileName);

	public function update();

	public function delete($user, $file);

	public function listAll();

}

?>