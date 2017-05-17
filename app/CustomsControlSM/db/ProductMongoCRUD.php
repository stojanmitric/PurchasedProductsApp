<?php

namespace CustomsControlSM\db;

require "../../../bootstrap/bootstrap.php";

class ProductMongoCRUD implements IProductCRUD
{

    public $mongoCollection;

    public function __construct()
    {

        $mongoDB = ACTIVE_DB;

        $this->mongoCollection = $mongoDB->selectCollection('uploads');

    }

    public function create($user, $fileName)
    {

        $data = array(
            "user" => $user,
            "file" => $fileName
        );

        $this->mongoCollection->insertOne($data);

    }

    public function update($user, $fileName)
    {
        $this->mongoCollection->updateOne(array('user' => $user),
            array('$set' => array('file' => $fileName))
        );

    }

    public function delete($fileName)
    {

        $remaining = $this->mongoCollection->count(array('file' => $fileName));

        while ($remaining > 0) {
            $this->mongoCollection->remove(array("file" => $fileName), array("justOne" => true));
            $remaining--;
        }

    }

    public function listAll()
    {
        $allRecords = $this->mongoCollection->find();
        return $allRecords;
    }
}

?>