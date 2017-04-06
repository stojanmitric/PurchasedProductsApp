<?php

require "../config.php";

use CustomsControlSM\Model\ProductEvidence;

?>

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

        </br>
        </br>

        <form method="post" action ="ProductEvidenceController.php" enctype="multipart/form-data">

          <div class="form-group">
              
              <div class="form-group">
                <label for="file_upload">Upload file</label>
                <input type="file" id="file_upload" name="file_upload">
                <p class="help-block">Click to choose your order evidence.</p>
              </div>

              <button type="submit" class="btn btn-default">Submit</button>
        </form>

        </br>
        </br>
        </br>

        <div class="row">


            <?php

            if(isset($_GET['uploadedFile'])) {
                $img = $_GET['uploadedFile'];
                $user = $_GET['user'];
                $unlink = unlink('../UploadedFiles/'.$img);

                if($unlink) {

                    if($activeDB === 'mysql') {

                        $delstmt = $db->prepare("DELETE FROM uploads where user='$user'");

                        $executed = $delstmt->execute();

                        header("LOCATION: http://localhost:8000/public/index.php");

                    } else {
                        //mongodb delete

                    }

                    if($executed) {
            ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Your file has been deleted from db and directory.
                </div>

            <?php

                } else {
            ?>

                <div class="alert alert-warning alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Your file is not in directory.
                </div>

            <?php
                }
            }

        }


            if($activeDB === 'mysql') {

            $selstmt = $db->prepare("SELECT * FROM uploads");
            $selstmt->execute();
            while($row = $selstmt->fetch()) {
            
        ?>
              <div class="col-xs-6 col-md-4">
              <div class= "tumbnail">    
                  <img style = "height:200px;" src="../UploadedFiles/<?php echo $row['file'] ?>" alt="<?php echo $row['file'] ?>" title = "<?php echo $row['file'] ?>">
              </div>

              <div class="caption text-center">
                <p><a href="?uploadedFile=<?php echo $row['file'] ?>&user=<?php echo $row['user'] ?>" class="btn btn-danger" role="button"> Delete </a>
              </div>
        </div>
        <?php
            }

        } else {

            //show pictures with mongo


        ?>
            <div class="col-xs-6 col-md-4">
              <div class= "tumbnail">    
                  <img style = "height:200px;" src="../UploadedFiles/<?php echo $row['file'] ?>" alt="<?php echo $row['file'] ?>" title = "<?php echo $row['file'] ?>">
              </div>

              <div class="caption text-center">
                <p><a href="?uploadedFile=<?php echo $row['file'] ?>&user=<?php echo $row['user'] ?>" class="btn btn-danger" role="button"> Delete </a>
            </div>
        <?php


        }

        ?>

    </div>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>