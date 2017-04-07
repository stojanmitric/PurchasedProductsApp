<?php

namespace CustomsControlSM\Model;

class ProductEvidence {

	public function __construct() {

	}

	public function saveProductEvidence($file) {
		//save local
		$user     = rand();
		$fileName = $file['name'];

		$fileToUpload = '../UploadedFiles/' . $fileName;

		if(!file_exists($fileToUpload)) {
			$move = move_uploaded_file($file['tmp_name'], $fileToUpload);
		} 

		//save on db
		if ($move) {
	        
	        if($activeDB==='mysql') {
	        	$mysql->create($user, $fileName);
	    	} else {
	    		$mongo->create($user, $fileName); 
	    	}
	        return true;
    	} else {
    		return false;
    	}
  
	}

	public function updateProductEvidence($file) {

	}

	public function deleteProductEvidence($fileName) {
			//delete from local
			$unlink = unlink('../UploadedFiles/'.$fileName);

			//delete from db
			if($unlink) {
				if($activeDB==='mysql') {
					$mysql->delete($fileName);
				} else {
					$mongo->delete($fileName);
				}
				return true;
    		} else {
    			return false;
    	}
	}

}

?>