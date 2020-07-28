<?php
include ("connect.php"); // DB접속

    $key = json_decode($_POST['temp'], true);
    $query = "select * from ticket".$key['table']." where id = '".$key['id']."' and name = '".$key['name']."' and time = '".$key['value']."'";
	$result = mysqli_query($con, $query);
    
    if($result)
    	$check = mysqli_affected_rows($con);
    if($check > 0)
        echo "false";
    else
        echo "true";
    mysqli_close($con);
?>
