<?php

namespace CustomsControlSM\db;

interface IProductCRUD
{

    public function create($user, $fileName);

    public function update($user, $fileName);

    public function delete($fileName);

    public function listAll();

}

?>