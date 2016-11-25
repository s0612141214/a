<?php include('page_header.ddphp'); 
if (!isset($_SESSION['userid'])){
  echo '<div class="text-danger">このサービスを利用するためにログインする必要があります</div>';
  include('page_footer.php');
  exit;
}
include ('db_inc.php'); 
$userid = $_SESSION['userid'];
$opt = '<h1>共有設定</h1>' ; 
$cid   = 0;
$scope = 0;
$cname = $cdetail = '';
if (isset($_GET['kid'])){ 
  $opt = '<h1>カレンダー共有設定</h1>' ;
  $kid=$_GET ['kid'] ;
  $sql = "SELECT * FROM tb_tb_calendar　 WHERE cid={$cid} AND owner='{$userid}'";
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

<div class="form-group">
  <label class="control-label col-sm-2">カレンダー選択：</label>
  <div class="col-sm-10">
    <select class="form-control" name="cid">
      <option value="0">未分類</option>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">メンバー選択</label>
    <div class="col-sm-10">
      <?php
  if (!isset($_POST['member_ready']) and !isset($_POST['query_ready'])) : // step 1: select members 
  ?>
  <form class="form-horizontal" action="sparetime.php" method="post">
    <input type="hidden" name="member_ready">
    <div class="form-group">
      <label class="control-label col-sm-2">メンバー選択</label>
      <div class="col-sm-10">
        <?php 
        $sql = "SELECT * FROM tb_user WHERE NOT userid='admin' ";
        $rs = mysql_query($sql, $conn);
        if (!$rs) die ('エラー: ' . mysql_error());
        while ($row = mysql_fetch_array($rs)) {
          $uid  = $row['userid'] ;
          $checked = in_array($uid, $members) ? 'checked' : '';
          $uname= $row['username'] ;
          echo '<label class="checkbox-inline">';
          echo "<input type=\"checkbox\" name=\"members[]\" value=\"$uid\" {$checked}/> " . $uname ;
          echo '</label>';
        } 
        ?>
      </div>
    </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input class="btn btn-success" type="submit" value="登録">
      <input class="btn btn-default" type="reset" value="取消">
    </div>
  </div>