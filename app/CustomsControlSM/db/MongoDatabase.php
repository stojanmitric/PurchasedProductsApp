<?php

class MongoDatabase implements IDatabase {

		public function init() {

				$mongoDBhost = "localhost:27017";
				$mongoDBname = "orders";
				$mongoDBusername = "stole";
				$mongoDBpassword = "stole";

				$mongoDB = new Client("mongodb://$mongoDBhost", array("username" => $mongoDBusername, "password" => $mongoDBpassword));

		}

		public function create($user, $fileName) {

					$mongoCollection = $mongoDB->selectDatabase('orders')->selectCollection('uploads');

		    		$data = array( 
				      "user" => $user, 
				      "file" => $fileName
				   	);
		    		$mongoCollection->insertOne($data);

		}

		public function update() {
			
		}

		public function delete($fileName) {

			$mongoCollection = $mongoDB->selectDatabase('orders')->selectCollection('uploads');
			$mongoCollection->remove(array("file"=> $fileName), array("justOne" => true));
				
		}

		public function listAll() {
			
		}
}

?>