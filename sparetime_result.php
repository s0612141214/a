<?php 
include('page_header.php');
include ('db_inc.php');
?>

<div class="page-header text-center"><h1>空き時間検索結果</h1></div>

<?php
  if (isset($_POST['query_ready'])){ // ready to compute 
    include('sparetime_inc.php');
  } 
  ?>


<?php
$sql="SELECT *FROM tb_calendar_share NATURAL JOIN tb_equate"
?>