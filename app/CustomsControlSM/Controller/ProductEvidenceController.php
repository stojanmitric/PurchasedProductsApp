<?php

use Model\ProductEvidence;

	$productEvidence = new ProductEvidence();

	if (isset($_FILES['file_upload'])) {
		$productEvidence->save($_FILES['file_upload']);
	}
?>