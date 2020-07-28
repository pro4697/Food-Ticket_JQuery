<!--
    Dimension by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<!DOCTYPE html>
<html>
  <head>
    <title>Dong-A University</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, user-scalable=no"
    />
    <script>
      document.write(
        "<link rel='stylesheet' href='assets/css/main.css?v=" +
          Date.now() +
          "'/>"
      );
    </script>
    <noscript
      ><link rel="stylesheet" href="assets/css/noscript.css"
    /></noscript>
  </head>
  <body class="is-preload">
    <!-- Wrapper -->
    <div id="wrapper">
      <!-- Header -->
      <header id="header">
        <div class="content">
          <div class="inner">
            <h1>동아대학교</h1>
            <h3>모바일 식권</h3>
            <h5>ID, PW 미입력시<br />guest로 로그인 됩니다.</h5>
          </div>
        </div>
        <form action="login_check.php" method="post">
          <input type="text" name="id" placeholder="학번" />
          <input type="password" name="pw" placeholder="비밀번호" />
          <input type="submit" value="로그인" />
        </form>
      </header>
      <footer id="footer"></footer>
    </div>

    <!-- BG -->
    <div id="bg"></div>
    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/booting.js"></script>
    <script src="assets/js/util.js"></script>
  </body>
</html>
