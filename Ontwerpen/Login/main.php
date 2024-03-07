<?php
// functie: startpagina

require_once "user.php";

$user = new user();

var_dump($user);

$user->registerUser();
$user->registeruser("jantje", "geheim", "e@r.nl", "admin");