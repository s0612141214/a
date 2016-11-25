
<?php include('page_header.php'); ?>

<div class="page-header text-center"><h1>ログイン画面</h1></div>
<form class="form-horizontal" action="check.php" method="post">
<div class="form-group">
  <div class="col-sm-offset-4 col-sm-4">
  <input type="text" class="form-control" name="userid" placeholder="ユーザＩＤ">
  </div>
</div>
<div class="form-group">   
<div class="col-sm-offset-4 col-sm-4">
  <input type="password" class="form-control" name="passwd" placeholder="パスワード">
</div>
</div>
<div class="form-group">
  <div class="col-sm-offset-4 col-sm-2">
    <button type="submit" class="btn btn-primary btn-block">ログイン</button>
  </div>
  <div class="col-sm-2">
    <a href="account.php" type="submit" class="btn btn-primary btn-block">新規登録</a>
  </div>
</div>
</form>

<?php include('page_footer.php'); ?>