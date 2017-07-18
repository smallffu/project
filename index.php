<?php 
session_start();  // 啟用交談期
echo $_SESSION["level"];
if(isset($_GET["logout"]))
{
 session_unset();
 header("Location: index.php"); 
 // 
}
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
            <li class="active"><a href="index.php">首頁</a></li>
            <li><a href="#about">上映電影</a></li>
            <li><a href="#contact">線上訂票</a></li>
            <li><a href="ranking.php">電影排行榜</a></li>
            <!--有登入才顯示會員資料-->
          <?php if($_SESSION["login_session"] == true): ?>
            <li><a href="member.php">會員資料</a></li>
          <?php endif?>  
          </ul>
          <!--有登入帳號顯示登出以及顯示登入使用者名稱，否則顯示登入-->
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
      <div class="container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <img src="images/shop.jpg" alt="First slide">
                <div class="container">
                  <div class="carousel-caption">
                    <h1>頂級的大廳</h1>
                  </div>
                </div>
              </div>
              <div class="item">
                <img src="images/imax.jpg" alt="Second slide">
                <div class="container">
                  <div class="carousel-caption">
                    <h1>IMAX的大螢幕</h1>
                  </div>
                </div>
              </div>
              <div class="item">
                <img src="images/seat.jpg" alt="Third slide">
                <div class="container">
                  <div class="carousel-caption">
                    <h1>全新高級座位</h1>
                  </div>
                </div>
              </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div><!-- /.carousel -->
        </div>

    <div class="container">
      <!-- Example row of columns -->
      <!-- Boxes -->
							<div id="main">
					<div class="inner">

					<!-- Boxes -->
						<div class="thumbnails">
	
							<div class="box">
								<a href="https://youtu.be/bPXI4sGdVxQ" class="image fit"><img src="images/Spider-Man.jpg" alt="" /></a>
								<div class="inner">
									<h3>蜘蛛人3</h3>
									<p>7/5(三)強檔上映<br>蜘蛛人：返校日<br>Spider-Man: Homecoming<br>級數：保護級(未滿6歲不能入場)</p>
									
									<a href="https://youtu.be/bPXI4sGdVxQ" class="button fit" data-poptrox="youtube,800x400">中文預告片</a>
								</div>
							</div>

							<div class="box">
								<a href="https://youtu.be/IxT_qJtIKAU" class="image fit"><img src="images/Transformers.jpg" alt="" /></a>
								<div class="inner">
									<h3>變形金剛5</h3>
									<p>6/21(三)強檔上映<br>變形金剛:最終騎士<br>Transformers: The Last Knigh<br>級數：輔12 (未滿12歲不能入場)</p>
									<a href="https://youtu.be/IxT_qJtIKAU" class="button style2 fit" data-poptrox="youtube,800x400">中文預告片</a>
								</div>
							</div>

							<div class="box">
								<a href="https://youtu.be/6S18O19CuGQ" class="image fit"><img src="images/Despicable2.jpg" alt="" /></a>
								<div class="inner">
									<h3>神偷奶爸3</h3>
									<p>6/29(四)強檔上映<br>神偷奶爸<br>Despicable Me3<br>級數：普遍級</p>
									<a href="https://youtu.be/6S18O19CuGQ" class="button style3 fit" data-poptrox="youtube,800x400">中文預告片</a>
								</div>
							</div>

							

						</div>

					</div>
				</div>
      <hr>

      <footer>
        <p>&copy; Company 2014</p>
      </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>



