<?php

namespace CustomsControlSM\db;

use MongoDB\Client;

class MongoDatabase implements IDatabase {

		private $mongoCollection;

		public function __construct() {

				$mongoDBhost = "localhost:27017";
				$mongoDBusername = "stole";
				$mongoDBpassword = "stole";

				$mongoDB = new Client("mongodb://$mongoDBhost", array("username" => $mongoDBusername, "password" => $mongoDBpassword));

				$mongoCollection = $mongoDB->selectDatabase('orders')->selectCollection('uploads');

                $this->mongoCollection = $mongoCollection;

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