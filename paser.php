<?php
session_start(); // 세션
include ("connect.php"); // DB접속
if($_SESSION['name'] != '관리자'){
    echo "<script>alert('로그인이 필요한 서비스 입니다.');";
    echo "location.href = 'index.php';</script>";
}
date_default_timezone_set('Asia/Seoul');
?>

<?php
	include 'simple_html_dom.php';
	//DB에 flag를 만든후 false면 파싱시작

	$nums = array();
	$url = 'https://www.donga.ac.kr/gzSub_007005005.aspx?DT='. date("Ymd"). '#mt';
	print '오늘자 주소 = '. $url. '<br>';
	$html = file_get_contents($url);
	$query = "delete from food0";
    $result = mysqli_query($con, $query);
    $query = "delete from food1";
    $result = mysqli_query($con, $query);
    $query = "delete from food2";
    $result = mysqli_query($con, $query);
    $cnt = 0;
	if($html !== false)
		$html = str_get_html($html);
    for($i = 1; $i <= 40; $i++){
        $tmp_string = '';
        foreach($html->find('table[summary=승학캠퍼스 식단표]') as $element){
		  //  echo $element->find('<br>',$i) . '<br>';
			$txt = $element->find('<td>', $i);
			$cnt = $cnt + 1;
            if($cnt == 6){
                $cnt = 1;
            }
			$num = strrpos($txt,')');
			$start = strpos($txt, '>');
			$text = substr($txt, $start+1, $num-$start);
			$first = 0;
			$end = 0;
			$pri = 0;
			$fname;
			$foodname;
			if($text != NULL){
			    //echo $text."<br /n>\n";
			    for($q = 0; $q < strlen($text); $q++){
			        if($text[$q] == '('){
				$end = $q;
				$fname = substr($text, $first, $end-$first);
				$pri = substr($text, $end+1, 4);
				if($fname[0] == ')'){
				    $fname = substr($fname, 1, $end - $first);
				    trim($fname);
				//    echo $fname."<br /n>\n";
				}else{
				    trim($fname);
				    //echo $fname."<br /n>\n";
				}
				trim($pri);
				//echo $pri."<br /n>\n";
				echo $fname."  ".$pri."<br/n>\n";
			    $fname = str_replace('<','',$fname);
			    $fname = str_replace('b','',$fname);
			    $fname = str_replace('r','',$fname);
			    $fname = str_replace('>','',$fname);
			    $fname = str_replace('a','',$fname);
			    $fname = str_replace('m','',$fname);
			    $fname = str_replace('p','',$fname);
			    $fname = str_replace(';','',$fname);
			    $fname = str_replace(' ','',$fname);
			    if($cnt == 1){
			        $query = "insert into food2(name, price) values('$fname', $pri)";
	                $result = mysqli_query($con, $query);
			    }else if($cnt == 2){
			        $query = "insert into food1(name, price) values('$fname', $pri)";
	                $result = mysqli_query($con, $query);
			    }else if($cnt == 4){
			        $query = "insert into food0(name, price) values('$fname', $pri)";
	                $result = mysqli_query($con, $query);
			    }
			//	$query = "insert into food1(name, price) values('$fname', $pri)";
	          //  $result = mysqli_query($con, $query);
	            
	           // echo $fname[0]."<br /n>\n";
			        }
			        if($text[$q] == ')'){
				$first = $q;
			        }
			    }
			}
			
        }
    }
    $query = "insert into food1(name, price) values('코카콜라', 700)";
	$result = mysqli_query($con, $query);
?>	



<!--		
//    foreach($html->find('table[summary=구덕/부민 캠퍼스]') as $element)
//		echo $element . '<br>';
/*
<tr> 의 각 원소들은 <td> 의 인덱스로 접근가능?. -> 안되는거같은데
<tr> 인덱스 0 -> (구분  , 교수회관, 학생회관 , 공과대학(X), 도서관 )
<tr> 인덱스 1 -> (정식  , 교수1   , 학생회관1, X          , 도서관1)
<tr> 인덱스 2 -> (일품  , 교수2   , 학생회관2, X          , 도서관2)
<tr> 인덱스 2 -> (양분식, X       , 학생회관3, X          , 도서관3)
foodname, fname = 음식 이름
pri = 음식 가격
-->
