<?php 
$msg = "";
session_start();  // 啟用交談期
// 是否有Session變數
if ($_SESSION["login_session"] != true)
   header("Location: login.php");  // 轉址至登入表單
else
   $msg = "歡迎使用者". $_SESSION["username"] ."進入網站!<br/>";

if(isset($_GET["logout"]))
{
 session_unset();
 header("Location: login.php");  // 轉址至登入表單
}
?>
<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8" />
<title>網站首頁</title>
</head>
<body>
<?php echo $msg; ?>
<a href="index.php?logout=1">登出</a>
</body>
</html>