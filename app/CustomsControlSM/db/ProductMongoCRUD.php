<?php

namespace CustomsControlSM\db;

require_once "../../../bootstrap/bootstrap.php";

class ProductMongoCRUD implements IProductCRUD {

    private $mongoCollection;

    public function __construct() {

        $mongoCollection = MONGO_DB;

        $this->mongoCollection = $mongoCollection->selectDatabase('orders')->selectCollection('uploads');

    }

    public function create($user, $fileName) {

        $data = array(
            "user" => $user,
            "file" => $fileName
        );

        $this->mongoCollection->insertOne($data);

    }

    public function update($user,$file) {
        $this->mongoCollection->updateOne(array('user'=> $user),
            array('$set' => array('file' => $file));

    }

    public function delete($user,$fileName) {

        $remaining = $this->mongoCollection->count(array('file' => $fileName));

        while($remaining >0) {
            $this->mongoCollection->remove(array("file" => $fileName), array("justOne" => true));
            $remaining--;
        }

    }

    public function listAll() {
        $allRecords = $this->mongoCollection->find();
        return $allRecords;
    }
}

?>