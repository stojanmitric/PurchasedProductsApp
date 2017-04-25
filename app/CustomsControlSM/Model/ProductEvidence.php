<?php

namespace CustomsControlSM\Model;

require "../../../bootstrap/bootstrap.php";

class ProductEvidence {

	public function __construct() {

	}

	public function saveProductEvidence($file) {
		//save local
		$user     = rand();
		$fileName = $file['name'];

		$fileToUpload = '../UploadedFiles/' . $fileName;

		$move = '';

		if(!file_exists($fileToUpload)) {
			$move = move_uploaded_file($file['tmp_name'], $fileToUpload);
		} 

		//save on db
		if ($move) {
	        
	        ACTIVE_DB->create($user, $fileName);

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

				ACTIVE_DB->delete($fileName);

				return true;
    		} else {
    			return false;
    	}
	}

}

?>