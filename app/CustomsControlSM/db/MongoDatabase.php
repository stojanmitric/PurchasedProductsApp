<?php

namespace CustomsControlSM\db;

use MongoDB\Client;

class MongoDatabase implements IDatabase {

		private $mongoDB;

		public function __construct() {

				$mongoDBhost = "localhost:27017";
				$mongoDBusername = "stole";
				$mongoDBpassword = "stole";

				$mongoDB = new Client("mongodb://$mongoDBhost", array("username" => $mongoDBusername, "password" => $mongoDBpassword));

                $this->mongoDB = $mongoDB;

		}

		public function create($user, $fileName) {

					$mongoCollection = $this->mongoDB->selectDatabase('orders')->selectCollection('uploads');

		    		$data = array( 
				      "user" => $user, 
				      "file" => $fileName
				   	);
		    		$mongoCollection->insertOne($data);

		}

		public function update() {
			
		}

		public function delete($user,$fileName) {

			$mongoCollection = $this->mongoDB->selectDatabase('orders')->selectCollection('uploads');
            $remaining = $mongoCollection->count(array('file' => $fileName));

            while($remaining >0) {
                $mongoCollection->remove(array("file" => $fileName), array("justOne" => true));
                $remaining--;
            }
				
		}

		public function listAll() {
			
		}
}

?>