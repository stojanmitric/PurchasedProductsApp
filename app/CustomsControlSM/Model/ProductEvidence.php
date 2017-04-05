<?php

namespace CustomsControlSM\Model;

class ProductEvidence {

public $name;
public $size;
public $type;
public $tmp;

	public function __construct($name,$size,$type,$tmp) {

		$this->name = $name;
		$this->size = $size;
		$this->type = $type;
		$this->tmp = $tmp;

	}

	public function save() {

		include ("../config.php");

		$user     = rand();

		$fileToUpload = '../UploadedFiles/' . $this->name;

		if(!file_exists($fileToUpload)) {
			$move = move_uploaded_file($this->tmp, $fileToUpload);
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