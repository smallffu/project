<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
require("db.php");
$username = "";
$password = "";
$name = "";
$email = "";
$phone = "";
$msg = "";
// 取得表單欄位
if (isset($_POST["Username"]))
   $username = $_POST["Username"];
if (isset($_POST["Password"]))
   $password = $_POST["Password"];
$name = $_POST['Name'];
$email = $_POST['Email'];
$phone = $_POST['Phone'];
// 檢查是否輸入使用者名稱和密碼
if ($username != "" && $password != "") {
   // 建立MySQL伺服器連接
   $db = mysqli_connect($db_host,$db_username,$db_password);
   mysqli_select_db($db, $db_name); // 選擇資料庫
   // 建立SQL指令字串
   $sql = "insert into users (username, password, name, email, phone) values ('$username', '$password', '$name', '$email', '$phone')";
   $rows = mysqli_query($db, $sql); // 執行SQL指令字串
  // 是否新增
  if (rows) {
      // 成功登入, 指定Session變數
      $_SESSION["login_session"] = true;
      $_SESSION["username"] = $username;
      header("Location: index.php");  // 轉址至首頁
  } else
      $msg =  "新增失敗!<br/>";
   mysqli_close($db);  // 關閉伺服器連接
}




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

    <title>註冊會員</title>

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
        <h2 class="form-signin-heading">註冊會員</h2>
        
        <label for="inputmember" class="sr-only">身分證字號</label>
        身分證字號：
        <input type="member" id="Username" class="form-control" placeholder="身分證字號" name="Username"  required autofocus>
        
        <label for="inputPassword" class="sr-only">密碼</label>
        密碼：
        <input type="password" id="Password" class="form-control" placeholder="密碼" name="Password"required>
        
        <!--<label for="inputPassword" class="sr-only">確認密碼</label>-->
        <!--<input type="password" id="ChackPassword" class="form-control" placeholder="確認密碼" required>-->
        
        <label for="inputName" class="sr-only">姓名</label>
        姓名：
        <input type="name" id="Name" class="form-control" placeholder="姓名" name="Name" required>
        
        <label for="inputEmail" class="sr-only">電子郵件</label>
        電子郵件：
        <input type="email" id="Email" class="form-control" placeholder="電子郵件" name="Email" required>
        
        
        <label for="inputPhone" class="sr-only">聯絡電話</label>
        連絡電話：
        <input type="phone" id="Phone" class="form-control" placeholder="電話" name="Phone" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> 記住帳號
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">註冊</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
