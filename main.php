<?php session_start(); if(is_null($_SESSION['name'])) echo "<script>alert('로그인이 필요한 서비스 입니다.');location.href = 'index.php';</script>"; ?>
<!DOCTYPE HTML>
<!--
    Dimension by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Dong-A University</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <script>document.write("<link rel='stylesheet' href='assets/css/main.css?v=" + Date.now() + "'/>");</script>
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	<!-- 안드로이드 홈화면추가시 상단 주소창 제거 -->
	<meta name="mobile-web-app-capable" content="yes">
	<link rel="icon" href="/img/favicon.ico">
	<!-- ios홈화면추가시 상단 주소창 제거 -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<link rel="apple-touch-icon" href="/img/favicon.ico">
</head>
<body class="is-preload">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- Header -->
        <header id="header">
            <button type="button" onclick="logout();"style="border-radius:500px;">
                <div class="logo">
                    <span class="icon fa-power-off"></span>
                </div>
            </button>
            <div class="content">
                <div class="inner">
                    <h1>동아대학교</h1>
                    <h3>모바일 식권</h3>
					<h4><?=$_SESSION['name']?>님 안녕하세요</h4>
                </div>
            </div>
            <nav>
                <ul>
                    <li><a href="#fir">중앙도서관</a></li>
                    <li><a href="#sec">학생회관</a></li>
                    <li><a href="#thr">교수회관</a></li>
                    <li><a href="#tic">식권보관함</a></li>
                </ul>
            </nav>
        </header>
        <!-- Main -->
        <div id="main" style="width : 500px">
		<a class="float"><img src="images/buy.png"></a>
            <!-- 중앙도서관 -->
            <article id="fir">
                <h2 class="major">중앙도서관</h2>
                <!-- 메뉴 테이블 -->
                <div id="menu_table_0"></div>

                <h2 class="major sub">장바구니</h2>

                <div id="menu_list_0"></div>

                <div class="btn_set">
                    <button type="button" onclick="payModule();">구매하기</button> <!-- 장바구니에 들어간게 없으면 경고창 출력 -->
                </div>
            </article>

            <!-- 학생회관 -->
            <article id="sec">
                <h2 class="major">학생회관</h2>
                <!-- 메뉴 테이블 -->
                <div id="menu_table_1"></div>

                <h2 class="major sub">장바구니</h2>
                <!-- 장바구니 -->
                <div id="menu_list_1"></div>

                <div class="btn_set">
                    <button type="button" onclick="payModule();">구매하기</button>
                </div>
            </article>

            <!-- 교수회관 -->
            <article id="thr">
                <h2 class="major">교수회관</h2>
                <!-- 메뉴 테이블 -->
                <div id="menu_table_2"></div>

                <h2 class="major sub">장바구니</h2>
                <!-- 장바구니 -->
                <div id="menu_list_2"></div>

                <div class="btn_set">
                    <button typ파일e="button" onclick="payModule();">구매하기</button>
                </div>
            </article>

            <!-- 식권 보관함 -->
            <article id="tic">
                <h2 class="major">식권 보관함 
					<button type="button" onclick="my_qrcode();" style="height:30px;">
					<img src="images/qr.jpg" width="30px" height="30px"/></button>
				</h2>
                <div id="qr_list"></div>
            </article>
        </div>
        <footer id="footer"></footer>
		<div id="_ID" style="display:none;"><?=$_SESSION['id']?></div>
		<div id="_NAME" style="display:none;"><?=$_SESSION['name']?></div>
		<div id="_TIME" style="display:none;"><?=$_SESSION['login_time']?></div>
    </div>
	
    <!-- BG -->
    <div id="bg"></div>
    <!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/qrcode.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
	<script>
		var script = document.createElement('script');
		script.src = "assets/js/main.js?v=" + Date.now();
		script.charset = "utf-8";
		document.getElementsByTagName('script')[0].parentNode.appendChild(script);
	</script>
    <script src="https://cdn.bootpay.co.kr/js/bootpay-3.0.0.min.js" type="application/javascript"></script>
    <script src="assets/js/qr_script.js"></script>
</body>
</html>