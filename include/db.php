<?php

$user = 'adam';
$pass = 'app135';
$base = 'moa';

$db = new mysqli('localhost', $user, $pass, $base) or die("Unable to connect to database 'moa'");

//echo 'Connected';

?>
