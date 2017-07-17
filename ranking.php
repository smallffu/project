<?php
session_start();  // 啟用交談期
if(isset($_GET["logout"]))
{
 session_unset();
 header("Location: index.php");  // 
}

header("content-type: text/html; charset=utf-8");

// 1. 初始設定
$ch = curl_init();

// 2. 設定 / 調整參數
curl_setopt($ch, CURLOPT_URL, "https://tw.movies.yahoo.com/movie_thisweek.html");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);

// 3. 執行，取回 response 結果
$pageContent = curl_exec($ch);

// 4. 關閉與釋放資源
curl_close($ch);
// echo htmlspecialchars($pageContent);

$doc = new DOMDocument();
libxml_use_internal_errors(true);//出現錯誤跳過
$doc->loadHTML($pageContent);

$xpath = new DOMXPath($doc);
$entries = $xpath->query("//*[@id='list1']/ul/a");



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/Content/AssetsBS3/img/favicon.ico">

    <title>大戲院</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron.css" rel="stylesheet">
    
    <link href="css/carousel.css" rel="stylesheet">
    
    <link href="css/main.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="~/Scripts/AssetsBS3/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
    

  </head>

  <body>
    

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">首頁</a></li>
            <li><a href="#about">上映電影</a></li>
            <li><a href="#contact">線上訂票</a></li>
            <li class="active"><a href="ranking.php">電影排行榜</a></li>
            <li><a href="member.php">會員資料</a></li>
          </ul>
          <?php if($_SESSION["login_session"] != true): ?>
          <form class="navbar-form navbar-right" role="form">
            <a class="btn btn-success" href="login.php">登入</a>
            <a class="btn btn-danger" href="register.php">註冊</a>
          </form>
          <?php else:?>
          <form class="navbar-form navbar-right" role="form">
            <?php echo "使用者:".$_SESSION["username"]; ?>
            <a class="btn btn-danger" href="index.php?logout=1">登出</a>
            
          </form>
          <?php endif?>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="container">
        <div class="row">
        
        <div class="col-md-12">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>排名</th>
                <th>電影名稱</th>
              </tr>
            </thead>
            <?php 
            foreach ($entries as $key => $entry) 
                {
                    $title = $xpath->query("./li/span", $entry);
                    $key=$key+1;
                    echo "<tbody><tr> <td>第".$key."名</td><td>" . $title->item(0)->nodeValue . "</td> </tr></tbody><br>";
                }
            ?>
            
          </table>
        </div>
      </div>
    </div>
    

      <hr>

      <footer>
        <p>&copy; Company 2014</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>



