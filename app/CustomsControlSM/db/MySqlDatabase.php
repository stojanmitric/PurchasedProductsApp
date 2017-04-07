<?php

class MySqlDatabase implements IDatabase {

		public function init() {
				$dbhost = "localhost:3333";
				$dbname = "orders";
				$dbusername = "stole";
				$dbpassword = "sifra";

				$db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);
		}

		public function create($user, $fileName) {

				$query = $db->prepare("INSERT INTO uploads (user, file) VALUES (:user, :file)");
			        
			    $query->bindParam(':user', $user);
			    $query->bindParam(':file', $fileName);
			        
			    $query->execute();

		}

		public function update() {
			
		}

		public function delete($user, $file) {

			$delstmt = $db->prepare("DELETE FROM uploads where user='$user'");

            $delstmt->execute();
			
		}

		public function listAll() {
			$selstmt = $db->prepare("SELECT * FROM uploads");
            $selstmt->execute();
		}
}
?>