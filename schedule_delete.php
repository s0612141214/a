<?php include('page_header.php');
include ('db_inc.php');

$userid = $_SESSION['userid'];

if (isset($_GET['kid'])){
	$kid=$_GET ['kid'] ;

	$sql = "DELETE FROM tb_schedule WHERE kid={$kid}";
	$rs = mysql_query($sql, $conn);
	echo '<h2>削除しました！</h2>';
}

include('page_footer.php');?>
