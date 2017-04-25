<?php


namespace CustomsControlSM\db;

interface IProductCRUD {

    public function create($user, $fileName);

    public function update($user,$file);

    public function delete($user, $file);

    public function listAll();

}

?>