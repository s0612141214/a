<?php 
include('page_header.php');
include ('db_inc.php'); 
$members  = $week = array();
if (!isset($_SESSION['userid'])){
  echo '<div class="text-danger">このサービスを利用するためにログインする必要があります</div>';
  include('page_footer.php');
  exit;
}
?>

<div class="page-header text-center"><h1>共有設定</h1></div>


<div class="form-group">
  <label class="control-label col-sm-3">カレンダー選択：</label>
  <div class="col-sm-7">
   <form class="form-" action="calender_share_save.php" method="post">
    <input type="hidden" name="member_ready">
    <select class="form-control" name="cid">
      <option value="0">未分類</option>
      <option value="0">PBS</option>
      <option value="0">プライベート</option>
    </select>
  </div>
</div>


<div class="form-group">
 <label class="control-label col-sm-3">メンバー選択:</label>
 <div class="col-sm-4">
   <?php 
   $sql = "SELECT * FROM tb_user WHERE NOT userid='admin'";
   $rs = mysql_query($sql, $conn);
   if (!$rs) die ('エラー: ' . mysql_error());
   while ($row = mysql_fetch_array($rs)) {
    $uid  = $row['userid'] ;
    $checked = in_array($uid, $members) ? 'checked': '';
    $uname= $row['username'] ;
    echo '<label class="checkbox-inline">';
    echo "<input type=\"checkbox\"name=\"members[]\"value=\"$uid\"{$checked}/> " . $uname ;
    echo '</label>';
  } 
  ?>
</div>
</div>

</div>
<div class="col-sm-offset-2 col-sm-8">
  <div class="form-group">
   <input class="btn btn-success btn-block" type="submit" value="登録">
 </div>
</div>
</form>


