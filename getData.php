<?php
include ("connect.php"); // DB접속
header("Content-Type:application/json");
	$id = $_POST['ID'];
	$menu0 = array();
	$menu1 = array();
	$menu2 = array();
	$tick0 = array();
	$tick1 = array();
	$tick2 = array();
	$hist = array();
	
	$query = "select * from food0"; // 도서관
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_object($result)){
		$t = new stdClass();
		$t->name = $row->name;
		$t->price = $row->price;
		$menu0[] = $t;
		unset($t);
	}

	$query = "select * from food1"; // 학생회관
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_object($result)){
		$t = new stdClass();
		$t->name = $row->name;
		$t->price = $row->price;
		$menu1[] = $t;
		unset($t);
	}

	$query = "select * from food2"; // 교수회관
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_object($result)){
		$t = new stdClass();
		$t->name = $row->name;
		$t->price = $row->price;
		$menu2[] = $t;
		unset($t);
	}

	$query = "select * from ticket0 where id='$id'";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_object($result)){
		$t = new stdClass();
		$t->name = $row->name;
		$t->time = $row->time;
		$tick0[] = $t;
		unset($t);
	}

	$query = "select * from ticket1 where id='$id'";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_object($result)){
		$t = new stdClass();
		$t->name = $row->name;
		$t->time = $row->time;
		$tick1[] = $t;
		unset($t);
	}

	$query = "select * from ticket2 where id='$id'";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_object($result)){
		$t = new stdClass();
		$t->name = $row->name;
		$t->time = $row->time;
		$tick2[] = $t;
		unset($t);
	}

	$query = "select * from history where id='$id'";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_object($result)){
		$t = new stdClass();
		$t->name = $row->name;
		$t->time = $row->time;
		$t->table = $row->_table;
		$hist[] = $t;
		unset($t);
	}
	$obj = array();
	$obj['mList0'] = $menu0;
	$obj['mList1'] = $menu1;
	$obj['mList2'] = $menu2;
	$obj['tList0'] = $tick0;
	$obj['tList1'] = $tick1;
	$obj['tList2'] = $tick2;
	$obj['hList'] = $hist;
	echo json_encode($obj);
    mysqli_close($con);
?>
