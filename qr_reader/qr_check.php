<?php
include ("connect.php"); // DB접속

    $key = json_decode($_POST['key'], true);

	$query = "select name from ticket".$key['table']." where id = '".$key['id']."' and name = '".$key['name']."' and time = '".$key['value']."'";
    $result = mysqli_query($con, $query);

	if ($result)
    	$check = mysqli_affected_rows($con);

    if ($check > 0) { // 유효한 식권인지
		if ($key['master'])
			$check = 1;
		else {
			$query = "select name from food".$key['table']." where name = '".$key['name']."'";
			$result = mysqli_query($con, $query);
			if ($result)
    			$check = mysqli_affected_rows($con);
		}
		
		if ($check > 0) { // 오늘 식단에 있는 식권인지
			$query = "delete from ticket".$key['table']." where id = '".$key['id']."' and name = '".$key['name']."' and time = '".$key['value']."'";
			$result = mysqli_query($con, $query);
			if ($result)
    			$check = mysqli_affected_rows($con);
			if ($check > 0)
				echo "true";
			else
				echo "false";
		}
		else 
			echo "not_today";
			
	}
    else
        echo "false";

    mysqli_close($con);
?>
