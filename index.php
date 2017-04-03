<!DOCTYPE html>


<html lang="en">

  <head>

    <title>Upload purchased product evidence</title>

	<script src="jquery-3.2.0.min.js"></script>
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  </head>

  <body>
    <div class="container">
    
    <?php

    	include "config.php";

    	if(isset($_FILES['file_upload'])) {
    		//$user = $app->user->name;
    		$user = 'stole';
    		$fileName = $_FILES['file_upload']['name'];
    		$size = $_FILES['file_upload']['size'];
    		$type = $_FILES['file_upload']['type'];
    		$tmp = $_FILES['file_upload']['tmp_name'];

    		$files = 'UploadedFiles/' . $fileName;

    		$move = move_uploaded_file($tmp,$files);

    		if($move) {
    			
    			$query = $db->prepare("INSERT INTO uploads (user, file) VALUES (:user, :file)");
				
    			$query->bindParam(':user', $user);
    			$query->bindParam(':file', $fileName);
    			

    			/*
    			$executed = $query->execute(array(
    				"user" => $user,
    				"file" => $fileName
    			));
				*/

    			if($query->execute()) {

    				?>

    				<div class="alert alert-success" role="alert">>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  Your file upload is successfull.
					</div>
					
					<?php

    			} else {

    				?>

    				<div class="alert alert-warning alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  Your file did not uploaded.
					</div>

					<?php

    			}
    		} else {

    		}
    	}	
	?>

		</br>
		</br>

		<form method="post" enctype="multipart/form-data">

		  <div class="form-group">
			  
			  <div class="form-group">
			    <label for="file_upload">Upload file</label>
			    <input type="file" id="file_upload" name="file_upload">
			    <p class="help-block">Click to choose your order evidence.</p>
			  </div>

			  <button type="submit" class="btn btn-default">Submit</button>
		</form>

		<div class="row">
			  <div class="col-xs-6 col-md-4">
			    <a href="#" class="thumbnail">
			      <img src="..." alt="...">
			    </a>
			  </div>

			  <div class="caption">
			  	<a href="#" class="btn btn-danger" role="button"> Delete </a>
			  </div>
		</div>

    </div>

 	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>