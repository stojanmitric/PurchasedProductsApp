<?php

require_once __DIR__ . '../vendor/autoload.php';

use CustomsControlSM\db\MySqlDatabase;
use CustomsControlSM\db\MongoDatabase;

$activeDB = 'mysql';

if($activeDB==='mysql') {
	$mysql = new MySqlDatabase();
} else {
	$mongo = new MongoDatabase();
}

?>