<?php
header ( "Location: login.php" ); // 画面転送
include ('db_inc.php'); // データベース接続
$uid = $_POST ['userid'];
$pass = $_POST ['passwd'];
$pass2 = $_POST['passwd2'];
$uname = $_POST ['username'];
$sex = $_POST ['sex'];
$year = $_POST ['year'];
$month = $_POST ['month'];
$day = $_POST ['day'];
$email = $_POST ['mail'];
$birthday = $_POST ['year'] . '-' . $_POST ['month'] . '-' . $_POST ['day'];
  //echo "ここにユーザー名".$uid.'</br>'.$pass.'</br>'.$uname.'</br>'.$sex.'</br>'.$year.'</br>'.$month.'</br>'.$day.'</br>'.$email.'</br>'.$job;

$sql = "INSERT INTO tb_user (userid,passwd,username,sex,birthday,email) VALUES ('{$uid}','{$pass}','{$uname}',$sex,'{$birthday}','{$email}')";	
$rs = mysql_query ( $sql, $conn ); // SQL文を実行
echo '<h2>保存しました！</h2>';
?>


