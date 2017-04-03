<?php

$dbhost = "localhost:3333";
$dbname = "orders";
$dbusername = "stole";
$dbpassword = "sifra";


$db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);

//$db = new mysqli('localhost:3333', 'stole', 'sifra', 'orders');
?>