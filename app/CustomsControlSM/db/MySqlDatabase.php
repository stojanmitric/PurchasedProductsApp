<?php

namespace CustomsControlSM\db;

use PDO;

class MySqlDatabase implements IDatabase {

		private $db;

		public function __construct() {
				$dbhost = "localhost:3333";
				$dbname = "orders";
				$dbusername = "stole";
				$dbpassword = "sifra";

				$db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);

				$this->db=$db;
		}

		public function create($user, $fileName) {

				$crestmt = $this->db->prepare("INSERT INTO uploads (user, file) VALUES (:user, :file)");

				$crestmt->bindParam(':user', $user);
				$crestmt->bindParam(':file', $fileName);

				$crestmt->execute();

		}

		public function update($user,$fileName) {
			$updstmt= $this->db->prepare("UPDATE uploads SET file='$fileName' where user='$user'")
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