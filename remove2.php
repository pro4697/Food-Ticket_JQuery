<?php
	include ("connect.php"); // DB접속
	$query = "delete from history";
	$result = mysqli_query($con, $query);
?>
