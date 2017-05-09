<?php

require_once "../config.php";

require_once "../bootstrap/bootstrap.php";

    $loader = new Twig_Loader_Filesystem('public');
    $twig = new Twig_Environment($loader);

    $twig->render('index.html', array(

    ));
?>