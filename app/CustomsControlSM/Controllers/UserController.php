<?php

namespace CustomsControlSM\Controllers;

use CustomsControlSM\Model\User;

$user = new User();

if (isset($_POST['register_btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $userName = $_POST['userName'];
    $password = $_POST['password'];

    $user->createUser($name, $email, $userName, $password);
}

if (isset($_POST['update_btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $userName = $_POST['userName'];
    $password = $_POST['password'];

    $user->updateUser($name, $email, $userName, $password);
}

if (isset($_POST['delete_btn'])) {

    $id = $_POST['id'];
    $user->deleteUser($id);
}


?>