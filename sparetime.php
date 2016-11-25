<?php 
include('page_header.php');
include ('db_inc.php');
$userid   = $_SESSION['userid'];
$kstime   = $ketime = date('Y-n-d h:i:s');
$members  = $week = array();
$length   = 1;
$unit     = 0;
?>
<script type="text/javascript">
  $(function () {
    $('.date').datetimepicker({
      locale: 'ja',
      format : 'YYYY-MM-DD HH:mm:ss'
    });
  });
</script>

<div class="page-header text-center"><h1>空き時間検索</h1></div>

<?php
  if (isset($_POST['query_ready'])){ // ready to compute 
    include('sparetime_inc.php');
  } 
  ?>

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

    <div class="form-group">
      <div class="col-sm-offset-4 col-sm-4">
        <input class="btn btn-success btn-block" type="submit" value="次へ">
      </div>
    </div>
  </form>

  <?php
  elseif (!isset($_POST['query_ready'])) :  // step 2: query condition
  ?>

  <form class="form-horizontal" action="sparetime.php" method="post">
    <input type="hidden" name="query_ready">
    <div class="form-group">
      <label class="control-label col-sm-2">開始日時:</label>
      <div class="col-sm-10">
        <div class="input-group date datetimepicker">
          <input class="form-control" type="date" name="kstime" value="<?=$kstime ?>"/>
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span></span>
        </div>
      </div>
    </div>

      <div class="form-group">
        <label class="control-label col-sm-2">終了日時:</label>
        <div class="col-sm-10">
          <div class="input-group date datetimepicker">
            <input class="form-control" type='text' name="ketime" value="<?=$ketime ?>"/>
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span></span>
            </div>
          </div>
        </div>

<div class="form-group">
  <label class="control-label col-sm-2">空き時間:</label>
  <div class="col-sm-4">
    <input type="number" min="1" class="form-control" name="length" value="<?=$length ?>"/>

    <?php
    $units = array('分','時間','終日');
    for ($i=0; $i < count($units); $i++){
      $checked = ($i==$unit) ? 'checked' : '';
      echo '<label class="radio-inline">';
      echo "<input type=\"radio\" name=\"unit\" value=\"$i\" {$checked}/> " . $units[$i];
      echo '</label>';
    }
    ?>
  </div> 
</div>     

<div class="form-group">
  <label class="control-label col-sm-2">時間帯希望:</label>
  <div class="col-sm-10">
    <label class="radio-inline"><input type="radio" name="settei">午前</label>
    <label class="radio-inline"><input type="radio" name="settei">午後</label>
    <label class="radio-inline"><input type="radio" name="settei">希望なし</label>
  </div>
</div>




    <div class="form-group">
      <label class="control-label col-sm-2" for="email">曜日指定:</label>
      <div class="col-sm-10">

        <?php
    $wdays = array("日", "月", "火", "水", "木", "金", "土");// 配列の初期化
    for ($i=0; $i < count($wdays); $i++){
      $checked = in_array($i, $week) ? 'checked' : '';
      echo '<label class="checkbox-inline">';
      echo "<input type=\"checkbox\" name=\"week[]\" value=\"{$i}\" {$checked}>" . $wdays[$i];
      echo '</label>';
    }
    ?>
  </div>
</div>

<div class="form-group">
  <label class="control-label col-sm-2">VIP指定:</label>
  <div class="col-sm-10">
    <?php
    $memers = array();
  foreach ($_POST['members'] as $uid)  $members[] = "'" . $uid ."'"; // single quoting each userid
  $members = implode(',', $members);
  echo '<input type="hidden" name="members" value="' . $members.'">';
  $sql = "SELECT * FROM tb_user WHERE userid IN ($members) ";
  //echo $sql;
  $rs = mysql_query($sql, $conn);
  if (!$rs) die ('エラー: ' . mysql_error());
  while ($row = mysql_fetch_array($rs)) {
    $uid  = $row['userid'] ;
    $uname= $row['username'] ;
    echo '<label class="checkbox-inline">';
    echo "<input type=\"checkbox\" name=\"vip[]\" value=\"$uid\"/> " . $uname ;
    echo '</label>';
  }
  ?>  
</div>
</div>  

<div class="form-group">
  <div class="col-sm-offset-2 col-sm-2">
    <a href="sparetime_result.php" type="submit" class="btn btn-success btn-block">検索</a>
    </div>
    <div class="col-3">
    <div class="col-sm-4">
    <input class="btn btn-default" type="reset" value="取消">
  </div>
</div>
</div>

    
    <!--<input class="btn btn-primary" type="submit" value="検索">-->
</form>

<?php endif; ?>

<!-- </div> -->
<?php include('page_footer.php');?>