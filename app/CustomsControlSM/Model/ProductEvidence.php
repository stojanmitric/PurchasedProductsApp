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

		$files = '../UploadedFiles/' . $this->name;

		$move = move_uploaded_file($this->tmp, $files);

		if ($move) {
	        
	        $query = $db->prepare("INSERT INTO uploads (user, file) VALUES (:user, :file)");
	        
	        $query->bindParam(':user', $user);
	        $query->bindParam(':file', $this->name);
	        
	        $query->execute();

	        return true;
    	} else {
    		return false;
    	}

        
	}

}

?>