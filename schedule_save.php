<?php
include('page_header.php');
include ('db_inc.php');
if (!isset($_SESSION['userid'])){
  echo '<div class="text-danger">このサービスを利用するためにログインする必要があります</div>';
  include('page_footer.php');
  exit;
}
include ('db_inc.php');
$userid = $_SESSION['userid'];

$vars = array_merge($_POST, $_GET);
//var_dump($vars);
if ($vars['opt']){
  $opt = $vars['opt'];
  if ($vars['opt']==='delete') {
    if (isset($vars['kid'])){
      $kid = $vars['kid'];
      $sql = "DELETE FROM tb_schedule WHERE kid={$kid}";
      $rs = mysql_query($sql, $conn);
    }
  }else{
    $kstime  = $vars['kstime'];
    $ketime  = $vars['ketime'];
    $kid    = $vars['kid'];
    $title  = $vars['title'];
    $place  = $vars['place'];
    $kmemo  = $vars['kmemo'];
    //$weight = $vars['weight'];
    $cid    = $vars['cid'];
    if ($opt==='create'){
      //weight=0に変更
      $sql = "INSERT INTO tb_schedule(userid,kstime,ketime,title,place,kmemo,weight,cid) VALUES ('{$userid}','{$kstime}','{$ketime}','{$title}','{$place}','{$kmemo}',0,$cid)";
    }else{
      //weight=0に変更
      $sql="UPDATE tb_schedule SET kstime='{$kstime}',ketime='{$ketime}',title='{$title}',place='{$place}',kmemo='{$kmemo}',weight=0,cid=$cid WHERE kid=$kid";
    }
    $rs = mysql_query($sql, $conn);
  }
}
echo '<h2>保存しました！</h2>';
include('page_footer.php');
?>