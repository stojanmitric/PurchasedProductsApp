<?php

require_once "../config.php";

require '../vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('public');
$twig = new Twig_Environment($loader);

echo $twig->render('index.html', array(
    'name' => 'stole',
    'age' => 25
));

?>
