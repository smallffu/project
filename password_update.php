<?php session_start();
require("db.php");
$username=$_SESSION["username"];
$password = "";

$password = $_POST['Password'];

   // 建立MySQL伺服器連接
   $db = mysqli_connect($db_host,$db_username,$db_password);
   mysqli_select_db($db, $db_name); // 選擇資料庫
   // 建立SQL指令字串
  
  if($password!=""){
     
      $sql = "update `users` SET `password` ='$password' WHERE `username` ='$username'";
      $rows = mysqli_query($db, "set names utf8");
      $rows = mysqli_query($db, $sql); // 執行SQL指令字串
      
     
     header("Location: member.php");
  }
  
  
  
   mysqli_close($db);  // 關閉伺服器連接





?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>密碼變更</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>


  </head>

  <body>

    <div class="container">

      <form class="form-signin" method = "POST" action="">
        <h2 class="form-signin-heading">密碼變更</h2>
        
        <label for="inputmember" class="sr-only">身分證字號</label>
        身分證字號：
        <input type="member" id="Username" class="form-control" placeholder="身分證字號" name="Username"  value = "<?php echo $_SESSION["username"];?>" readonly="readonly">
        
        <label for="inputPassword" class="sr-only">密碼</label>
        新密碼：
        <input type="password" id="Password" class="form-control" placeholder="密碼" name="Password" required>
        
        <label for="inputPassword" class="sr-only">確認密碼</label>
        確認密碼：
        <input type="password" id="CheckPassword" class="form-control" placeholder="確認密碼" name="CheckPassword"required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">儲存變更</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
