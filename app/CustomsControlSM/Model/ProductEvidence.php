<?php

namespace CustomsControlSM\Model;

class ProductEvidence {

	public function __construct() {

	}

	public function save($file) {

		include ("../config.php");

		$user     = rand();

		$fileToUpload = '../UploadedFiles/' . $file['name'];

		if(!file_exists($fileToUpload)) {
			$move = move_uploaded_file($file['tmp_name'], $fileToUpload);
		} 

		if ($move) {
	        
	        if($activeDB==='mysql') {

		        $query = $db->prepare("INSERT INTO uploads (user, file) VALUES (:user, :file)");
		        
		        $query->bindParam(':user', $user);
		        $query->bindParam(':file', $this->name);
		        
		        $query->execute();

	    	} else {

	    		$mongoCollection = $mongoDB->selectDatabase('orders')->selectCollection('uploads');

	    		$data = array( 
			      "user" => $user, 
			      "file" => $this->name
			   	);

	    		$mongoCollection->insertOne($data);
	    	}

	        return true;
    	} else {
    		return false;
    	}

        
	}

}

?>