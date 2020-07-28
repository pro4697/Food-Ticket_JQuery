<?php

$db_host = "localhost";
$db_user = "u567672324_kichan";
$db_password = "donga1234";
$db_name = "u567672324_fooddb";


$con = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($con->connect_errno) { die('Connection Error : '.$con->connect_error); }

?>