<?php

namespace CustomsControlSM\db;

require "../../../bootstrap/bootstrap.php";

class ProductMySqlCRUD implements IProductCRUD {

    public $db;

    public function __construct() {

        $db = ACTIVE_DB;

        $this->db=$db;
    }

    public function create($user, $fileName) {

        $crestmt = $this->db->prepare("INSERT INTO uploads (user, file) VALUES (:user, :file)");

        $crestmt->bindParam(':user', $user);
        $crestmt->bindParam(':file', $fileName);

        $crestmt->execute();

    }

    public function update($user,$fileName) {
        $updstmt= $this->db->prepare("UPDATE uploads SET file='$fileName' where user='$user'");
        $updstmt->execute();
    }

    public function delete($user, $fileName) {

        $delstmt = $this->db->prepare("DELETE FROM uploads where user='$user'");
        $delstmt->execute();

    }

    public function listAll() {
        $selstmt = $this->db->prepare("SELECT * FROM uploads");
        $selstmt->execute();
    }


}

?>