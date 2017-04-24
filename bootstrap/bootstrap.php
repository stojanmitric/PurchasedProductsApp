<?php
    require_once __DIR__ . '../vendor/autoload.php';

    use CustomsControlSM\db\MySqlDatabase;
    use CustomsControlSM\db\MongoDatabase;

    $chooseDB = 'mysql';

    if($chooseDB==='mysql') {
    $GLOBALS['activeDB'] = new MySqlDatabase();
    } else {
    $GLOBALS['activeDB'] = new MongoDatabase();
    }
?>
