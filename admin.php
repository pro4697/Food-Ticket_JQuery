<?php
session_start();
include ("connect.php");
if($_SESSION['name'] != '관리자'){
    echo "<script>alert('로그인이 필요한 서비스 입니다.');";
    echo "location.href = 'index.php';</script>";
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Dong-A University</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
	<script src="assets/js/jquery.min.js"></script>
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>
<body class="is-preload">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- Header -->
        <header id="header">
            <button type="button" onclick="logout();" style="border-radius:500px;">
                <div class="logo">
                    <span class="icon fa-power-off"></span>
                </div>
            </button>
            <div class="content">
                <div class="inner">
                    <h1>동아대학교</h1>
                    <h3>모바일 식권</h3>
					<h4>관리자 페이지 입니다.</h4>
                </div>
            </div>
            <nav>
                <ul>
                    <li><a href="javascript:void(0);" onclick="remove_ticket();">식권삭제</a></li>
                    <li><a href="javascript:void(0);" onclick="remove_history();">내역삭제</a></li>
                    <li><a href="javascript:void(0);" onclick="remove_DB();">메뉴DB삭제</a></li>
                    <li><a href="qr_reader/index.html">QR리더</a></li>
                </ul>
            </nav>
        </header>
        <!-- Main -->
        <footer id="footer"></footer>
      </div>
	<!-- &{MAX_CHOICE}; html에서 js변수 호출 방법-->
    <!-- BG -->
    <div id="bg"></div>

    <!-- Scripts -->
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/booting.js" charset="utf-8"></script>

<script>
    function logout(s = "") {
        if (confirm(s + "로그아웃 하시겠습니까?"))
            location.replace('index.php');
    }
    
	function remove_ticket(){
	    if(!confirm("식권보관함을 비우시겠습니까?"))
			return;
	    
		$.ajax({
			url: "remove.php",
			method: "post"
		});
		logout("삭제완료.\n");
	}
	function remove_history(){
	    if(!confirm("식권구매내역을 비우시겠습니까?"))
			return;
	    
		$.ajax({
			url: "remove2.php",
			method: "post"
		});
		logout("삭제완료.\n");
	}
	function remove_DB(){
	    if(!confirm("메뉴DB를 삭제하시겠습니까?"))
			return;
	    
		$.ajax({
			url: "remove3.php",
			method: "post"
		});
		logout("삭제완료.\n");
	}
	
</script>
</body>
</html>