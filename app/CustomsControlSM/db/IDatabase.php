<?php

namespace db;

use MongoDB\Client;

interface DBConnectionWrapper {

	public function init();

	public function add();

	public function update();

	public function delete();

}

?>