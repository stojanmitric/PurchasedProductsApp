<?php

    require_once __DIR__ . '../vendor/autoload.php';

    require_once '../config.php';

    use MongoDB\Client;

    use CustomsControlSM\db\UserMongoCRUD;
    use CustomsControlSM\db\UserMySqlCRUD;


    if(ACTIVE_DB == 'mysql') {

        $dbhost = "localhost:3333";
        $dbname = "orders";
        $dbusername = "stole";
        $dbpassword = "sifra";

        $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);

        define('MYSQL_DB', $db);

    } else {

        $mongoDBhost = "localhost:27017";
        $mongoDBusername = "stole";
        $mongoDBpassword = "stole";

        $mongoDB = new Client("mongodb://$mongoDBhost", array("username" => $mongoDBusername, "password" => $mongoDBpassword));

        define('MONGO_DB', $mongoDB);

    }
?>
