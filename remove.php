<?php
	include ("connect.php"); // DB접속
	$query = "delete from ticket0";
	$result = mysqli_query($con, $query);
	$query = "delete from ticket1";
	$result = mysqli_query($con, $query);
	$query = "delete from ticket2";
	$result = mysqli_query($con, $query);
?>
