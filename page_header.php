<?php session_start(); 
date_default_timezone_set('Asia/Tokyo');
?>
<!DOCTYPE html>
<html lang="ja"><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>TimeFinder: 空き時間検索</title>
<link type="text/css" href="calendar.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Eonasdan/bootstrap-datetimepicker@v4.0.0/build/css/bootstrap-datetimepicker.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div class="navbar navbar-inverse bg-primary">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">ナビゲーションの切替</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><code>TimeFinder</code></a>
    </div>
    <!-- /.navbar-header -->
   <div class="navbar-collapse collapse">
    <?php if(isset($_SESSION['userid'])):  ?>
     <ul class="nav navbar-nav">
      <li><a href="index.php">ホーム</a></li> 
      <li><a href="schedule_edit.php">スケジュール登録</a></li>
      <li class="dropdown">
        <a href="calendar.php" class="dropdown-toggle" data-toggle="dropdown">カレンダー管理<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="new_calender.php">新規登録</a></li>
          <li><a href="calendar_share.php">共有設定</a></li>
        </ul>
      </li>
      <li><a href="sparetime.php">空き時間検索</a></li>
     </ul>
     <ul class="nav navbar-nav navbar-right">  
       <li><a><?=$_SESSION['username'] ?>様</a></li>
       <li><a href="logout.php">ログアウト</a></li>
     </ul>
    <?php else: ?>
     <ul class="nav navbar-nav navbar-right">
      <li><a href="login.php">ログイン</a></li>
     </ul>
    <?php endif; ?>
  </div>
</div>
</div>
<div class="container">