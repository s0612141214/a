<?php include('page_header.php'); 
include ('db_inc.php'); // データベース接続

$uid = $_POST ['userid'];
$pass = $_POST ['passwd'];
$uname = $_POST ['username'];
$sex = $_POST ['sex'];
$year = $_POST ['year'];
$month = $_POST ['month'];
$day = $_POST ['day'];
$email = $_POST ['mail'];
//$job = $_POST ['job'];
$birthday = $_POST ['year'] . '-' . $_POST ['month'] . '-' . $_POST ['day'];

//if($pass != $pass2){
	//echo"パスワードをもう一度正しく入力してください。";
//}else{
	if($uid==""){
		echo "IDが入力されていません。";
	}else if($pass==""){
		echo "パスワードが入力されていません。";
	}else if($uname==""){
		echo "ユーザ名が入力されていません。";
	}else if($sex==""){
		echo "性別が入力されていません。";
	}else if($birthday==""){
		echo "生年月日が入力されていません。";
	}else if($mail==""){
		echo "メールアドレスが入力されていません。";
?>

<div class="col-sm-offset-3 col-sm-6 well well-sm">

	<?php
	echo "<h1>"."登録情報の確認"."</h1>";
	echo "<h3>"."この内容で登録してよろしいですか？"."</h3>"."<br>";
	echo "<h4>"."ユーザーID：".$uid."</h4><br>";
	echo "<h4>"."パスワード：".$pass."</h4><br>";
	echo "<h4>"."ユーザ名：".$uname."</h4><br>";
	echo "<h4>"."性別：".$sex."</h4><br>";
	echo "<h4>"."生年月日：".$birthday."</h4><br>";
	echo "<h4>"."メールアドレス：".$mail."</h4><br>";
	?>
</div>
<form class="form-horizontal" action="new_account_save.php" method="post">
	
	<input type="hidden" name="uid" value=<?php echo $uid; ?>>
	<input type="hidden" name="pass" value=<?php echo $pass; ?>>
	<input type="hidden" name="uname" value=<?php echo $uname; ?>>
	<input type="hidden" name="sex" value=<?php echo $sex; ?>>
	<input type="hidden" name="birthday" value=<?php echo $birthday; ?>>
	<input type="hidden" name="mail" value=<?php echo $mail; ?>>
 
	<div class="text-center">
		<!-- 登録ボタンの表示 -->
		<button type="submit" class="btn btn-default">登録</button>

		<input type=button class="btn btn-default" value="戻る" onClick="javascript:history.go(-1)">
		</div>
</form>


<?php include('page_footer.php'); ?>