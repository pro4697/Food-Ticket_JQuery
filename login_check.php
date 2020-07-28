<?php
session_start(); // 세션
include ("connect.php"); // DB접속
date_default_timezone_set('Asia/Seoul');

	$id = $_POST['id']; // 아이디 
	$pw = $_POST['pw']; // 패스워드
	if(empty($id) && empty($pw)){
		$id = 'guest';
		$pw = 'guest';
	}
	$pass = hash("sha256", $pw);

	$query = "select * from users where id='$id' and pw='$pass'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	echo "<script>";
	if ($id == $row['id'] && $pass == $row['pw'] && !empty($id) && !empty($pw)){
		$today = date("Ymd");
		$_SESSION['id'] = $row['id'];
		$_SESSION['name'] = $row['name'];
		$_SESSION['login_time'] = $today;

		$query = "select * from today";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);

		
		if($today != $row['date']) {
			$query = "update today set date = '$today' where date = '".$row['date']."'";
			mysqli_query($con, $query);
			$query = "delete from food0";
			mysqli_query($con, $query);
			$query = "delete from food1";
			mysqli_query($con, $query);
			$query = "delete from food2";
			mysqli_query($con, $query);
			
			//////////////////////////////////////  ---- Parsing ----  //////////////////////////////////////////////////
			include_once 'simple_html_dom.php';
			$url = 'https://www.donga.ac.kr/gzSub_007005005.aspx?DT='.$today.'#mt';
		
			$str = file_get_contents_curl($url);
			$enc = mb_detect_encoding($str, array('EUC-KR', 'UTF-8', 'shift_jis', 'CN-GB'));
			if ($enc != 'UTF-8')
				$str = iconv($enc, 'UTF-8', $str);		
		
			$html = new simple_html_dom(); // Create a DOM object
			$html->load($str); // Load HTML from a string

			$cnt = 0;
			for ($i = 1; $i <= 40; $i++) {
				$tmp_string = '';
				foreach ($html->find('table[summary=승학캠퍼스 식단표]') as $element) {
					$txt = $element->find('<td>', $i);
					$cnt = $cnt + 1;
					if ($cnt == 6)
						$cnt = 1;

					$num = strrpos($txt,')');
					$start = strpos($txt, '>');
					$text = substr($txt, $start+1, $num-$start);
					$first = 0;
					$end = 0;
					$pri = 0;
					$fname;
					$foodname;
					if ($text != NULL) {
						for ($q = 0; $q < strlen($text); $q++) {
							if ($text[$q] == '(') {
								$end = $q;
								$fname = substr($text, $first, $end-$first);
								$pri = substr($text, $end+1, 4);
								if ($fname[0] == ')') {
									$fname = substr($fname, 1, $end - $first);
									trim($fname);
								}
								else
									trim($fname);
								trim($pri);

								$fname = str_replace('<','',$fname);
								$fname = str_replace('b','',$fname);
								$fname = str_replace('r','',$fname);
								$fname = str_replace('>','',$fname);
								$fname = str_replace('a','',$fname);
								$fname = str_replace('m','',$fname);
								$fname = str_replace('p','',$fname);
								$fname = str_replace(';','',$fname);
								$fname = str_replace(' ','',$fname);
								if ($cnt == 1) {
									$query = "insert into food2(name, price) values('$fname', $pri)";
									$result = mysqli_query($con, $query);
								}
								else if ($cnt == 2) {
									$query = "insert into food1(name, price) values('$fname', $pri)";
									$result = mysqli_query($con, $query);
								} 
								else if ($cnt == 4) {
									$query = "insert into food0(name, price) values('$fname', $pri)";
									$result = mysqli_query($con, $query);
								}
							}
							if ($text[$q] == ')')
								$first = $q;
						}
					}
				}
			}
			$query = "insert into food1(name, price) values('코카콜라', 700)";
			$result = mysqli_query($con, $query);
		}
		if($id == "admin")
			echo "location.href='admin.php';";  
		else
			echo "location.href='main.php';";   
	}
	else {
		echo "window.alert('잘못된 아이디 또는 비밀번호 입니다.');";
		echo "location.href='index.php';";
	}
	echo "</script>";
	
	function file_get_contents_curl($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // https 일때 이 한줄 추가 필요
		//Set curl to return the data instead of printing it to the browser.
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
?>
