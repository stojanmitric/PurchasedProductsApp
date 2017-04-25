<?php

namespace CustomsControlSM\Controllers;

use CustomsControlSM\Model\ProductEvidence;

class ProductEvidenceController
{
	private $productEvidence;

	public function __construct(array $options = array()) {

		$this->productEvidence = new ProductEvidence();
	}

	public function save()
	{


		//create file
		if (isset($_FILES['file_upload'])) {

			$this->productEvidence->saveProductEvidence($_FILES['file_upload']);
		}

	}

	public function delete()
	{

		//delete file
		if (isset($_GET['uploadedFile'])) {

			$user = $_GET['user'];
			$fileName = $_GET['uploadedFile'];

			$this->productEvidence->deleteProductEvidence($fileName);

		}
	}


	public function update()
	{
		//update file
	}


}
?>