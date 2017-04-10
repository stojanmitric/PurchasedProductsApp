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

				$query = $this->db->prepare("INSERT INTO uploads (user, file) VALUES (:user, :file)");
			        
			    $query->bindParam(':user', $user);
			    $query->bindParam(':file', $fileName);
			        
			    $query->execute();

		}

		public function update() {
			
		}

		public function delete($user, $file) {

			$delstmt = $this->db->prepare("DELETE FROM uploads where user='$user'");

            $delstmt->execute();
			
		}

		public function listAll() {
			$selstmt = $this->db->prepare("SELECT * FROM uploads");
            $selstmt->execute();
		}
}
?>