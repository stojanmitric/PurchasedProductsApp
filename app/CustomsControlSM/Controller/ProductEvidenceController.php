<?php

use CustomsControlSM\Model\ProductEvidence;

	$productEvidence = new ProductEvidence();

	//create file
	if (isset($_FILES['file_upload'])) {

		$productEvidence->saveProductEvidence($_FILES['file_upload']);
	}

	//delete file
	if(isset($_GET['uploadedFile'])) {

		$user = $_GET['user'];
        $fileName = $_GET['uploadedFile'];
        
        productEvidence->deleteProductEvidence($fileName);
              
    }
?>