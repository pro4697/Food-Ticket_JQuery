<?php
include ("connect.php"); // DB접속

	$key = json_decode($_POST['_key'], true);
	foreach($key as $row){
		$query = "insert into ticket".$row['table']."(id, name, time) values('".$row['id']."','".$row['name']."','".$row['time']."')";
		mysqli_query($con, $query);
		print_r($row);
		
		$query = "insert into history(id, name, time, _table) values('".$row['id']."','".$row['name']."','".$row['time']."','".$row['table']."')";
		mysqli_query($con, $query);
		print_r($row);
	}
?>
