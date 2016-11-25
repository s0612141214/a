<?php include('page_header.php'); 
if (!isset($_SESSION['userid'])){
  echo '<div class="text-danger">このサービスを利用するためにログインする必要があります</div>';
  include('page_footer.php');
  exit;
}
include ('db_inc.php'); 
$userid = $_SESSION['userid'];
$opt = '<h1>新規カレンダー作成</h1>' ; 
$cid   = 0;
$scope = 0;
$cname = $cdetail = '';


if (isset($_GET['kid'])){ 
  $opt = '<h1>カレンダー編集</h1>' ;
  $kid=$_GET ['kid'] ;
  $sql = "SELECT * FROM tb_calendar WHERE cid={$cid} AND owner='{$userid}'";
  $rs = mysql_query ($sql, $conn);
  if (! $rs) die ( 'エラー: ' . mysql_error ());
  $row = mysql_fetch_array ($rs);
  $cid    =$row ['cid'];
  $cname  =$row ['cname'];
  $detail =$row ['cdetail'];
  $scope  =$row ['scope'];
  $owner  =$row ['owner'];
}
echo $opt;
?>

<form class="form-horizontal">
 <div class="form-group">
  <label class="control-label col-sm-2">カレンダー名：</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" name="title" >
  </div>
</div>

<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <input class="btn btn-success" type="submit" value="登録">
    <input class="btn btn-default" type="reset" value="取消">
  </div>
</div>



  <?php include('page_footer.php'); ?>