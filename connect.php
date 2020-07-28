<?php

$db_host = "localhost";
$db_user = "id9322549_donga";
$db_password = "donga1234";
$db_name = "id9322549_database";


$con = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($con->connect_errno) { die('Connection Error : '.$con->connect_error); }

?>