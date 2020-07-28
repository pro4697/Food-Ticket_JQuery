<?php
	include ("connect.php"); // DB접속
	$query = "delete from today";
	$result = mysqli_query($con, $query);
	$query = "delete from food0";
	$result = mysqli_query($con, $query);
	$query = "delete from food1";
	$result = mysqli_query($con, $query);
	$query = "delete from food2";
	$result = mysqli_query($con, $query);
?>
