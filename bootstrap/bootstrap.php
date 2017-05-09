<?php

    require_once __DIR__ . '../vendor/autoload.php';

    require_once '../config.php';

    use MongoDB\Client;

    use CustomsControlSM\db\UserMongoCRUD;
    use CustomsControlSM\db\UserMySqlCRUD;

    if(CHOOSE_DB == 'mysql') {

        $dbhost = "localhost:3333";
        $dbname = "orders";
        $dbusername = "stole";
        $dbpassword = "sifra";

        $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);

        $activeDB=$db;

    } else {

        $mongoDBhost = "localhost:27017";
        $mongoDBusername = "stole";
        $mongoDBpassword = "stole";

        $mongoConnection = new Client("mongodb://$mongoDBhost", array("username" => $mongoDBusername, "password" => $mongoDBpassword));

        $mongoDB = $mongoConnection->selectDatabase('orders');

        $activeDB=$mongoDB;

    }

    define('ACTIVE_DB',$activeDB);
?>
