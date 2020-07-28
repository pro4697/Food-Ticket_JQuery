<?php
include ("connect.php"); // DB접속

    $key = json_decode($_POST['_key'], true);
	$pass = hash("sha256", $key['cur_pw']);

	$query = "select * from users where id='".$key['cur_id']."' and pw='$pass'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);

	if($key['cur_id']==$row['id'] && $pass==$row['pw']){ // 1. 현재 계정 비밀번호 체크
		$query = "select id, name from users where id = '".$key['pre_id']."' and name = '".$key['pre_name']."'";
		$result = mysqli_query($con, $query); // 2. 보낼 사람의 유효성 체크

		if(mysqli_num_rows($result) == 1) {
			$query = "update ticket".$key['table']." set id = '".$key['pre_id']."', time = '".$key['new_time']."' where id = '".$key['cur_id']."' and name = '".$key['name']."' and time = '".$key['time']."'";
			$result = mysqli_query($con, $query);
		
			if($result) { $check = mysqli_affected_rows($con); }
			if($check > 0) { echo "true"; }
			else { echo "false"; }
		}
		else { echo "false_id"; }
	}
	else { echo "false_pw"; }
    mysqli_close($con);
?>
