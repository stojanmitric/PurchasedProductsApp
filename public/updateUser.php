<?php

use CustomsControlSM\Controllers\UserController;

?>
<!DOCTYPE html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <title> Website </title>
    <link rel="stylesheet" href="" type="text/css" />
    <script type="text/javascript"></script>
</head>

<body>

<div class="container">
    <div class="jumbotron">
        <h1>User registration <small>Stojan Mitric</small></h1>
    </div>
</div>
<div class="container">

    <form method="post" action="UserController.php">
        <table class="table table-hover">
            <tr>
                <td><input type="hidden" name="id" ></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" class="form-control" name="name" placeholder="Enter your name"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" class="form-control" name="email" placeholder="Enter your email"></td>
            </tr>

            <tr>
                <td>User name</td>
                <td><input type="text" class="form-control" name="userName" placeholder="Enter your username"></td>
            </tr>

            <tr>
                <td>Password</td>
                <td><input type="text" class="form-control" name="password" placeholder="Enter your password"></td>
            </tr>

            <tr>
                <td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="update_btn" value="Update"></td>
            </tr>
        </table>
    </form>

</div>

</body>
</html>