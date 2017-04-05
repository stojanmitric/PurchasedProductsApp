<?php

require_once __DIR__ . '../vendor/autoload.php';

use MongoDB\Client;

$activeDB = 'mongo';

	if($activeDB === 'mysql') {

		$dbhost = "localhost:3333";
		$dbname = "orders";
		$dbusername = "stole";
		$dbpassword = "sifra";


		$db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);

	} else {

		$mongoDBhost = "localhost:27017";
		$mongoDBname = "orders";
		$mongoDBusername = "stole";
		$mongoDBpassword = "stole";

		$mongoDB = new Client("mongodb://$mongoDBhost", array("username" => $mongoDBusername, "password" => $mongoDBpassword));

	}

?>