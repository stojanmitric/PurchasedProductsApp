<?php

require_once __DIR__ . '../vendor/autoload.php';

use db\MongoDatabase;
use db\MySqlDatabase;

$activeDB==='mysql';

if($activeDB==='mysql') {
	$mysql = new MySqlDatabase();
	$mysql->init();
} else {
	$mongo = new MongoDatabase();
	$mongo->init();
}

?>