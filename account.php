<?php include('page_header.php'); ?>

<div class="page-header text-center">
  <h1>新規登録</h1>
</div>

<div class="col-sm-offset-3 col-sm-6 well well-sm">
  <!--<div class="text-right">※は必須項目です。</div>-->
  <form class="form-horizontal" action="account_save.php" method="post">
    <fieldset>
      <!-- ラベルとコントロールの表示 -->
      <div class="form-group">
        <label for="uid" class="col-sm-4 control-label">ユーザＩＤ:</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="userid" placeholder="ID">
        </div>
      </div>

      <div class="form-group">
        <label for="Password" class="col-sm-4 control-label text-right">パスワード:</label>
        <div class="col-sm-5">
          <input type="password" class="form-control" name="passwd" placeholder="パスワードを入力。">
        </div>
      </div>

      <div class="form-group">
        <label for="Password" class="col-sm-4 control-label text-right">確認用パスワード:</label>
        <div class="col-sm-5">
          <input type="password" class="form-control" name="passwd2" placeholder="上と同じパスワードを入力。">
        </div>
      </div>

      <div class="form-group">
        <label for="name" class="col-sm-4 control-label text-right">名前：</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="username" placeholder="表示する名前を入力">
        </div>
      </div>

      <div class="form-group">
        <label for="sex" class="control-label col-sm-4 text-right">性別：</label>
        <div class="col-sm-4">
          <select class="form-control" name="sex">
            <option value="1" selected>男性</option>
            <option value="0">女性</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label for="birth" class="control-label col-sm-4 text-right">生年月日：</label>
        <div class="col-sm-8 form-inline">
          <input type="text" class="form-control" placeholder="年" style="width: 70px" name="year"><span style="margin: 0 5px;">年</span>
          <input type="text" class="form-control" placeholder="月" style="width: 50px" name="month"><span style="margin: 0 5px;">月</span>
          <input type="text" class="form-control" placeholder="日" style="width: 50px" name="day"><span style="margin: 0 5px;">日</span>
        </div>
      </div>        

      <div class="form-group">
        <label for="mail" class="col-sm-4 control-label text-right">メールアドレス:</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="mail" placeholder="testmail@test.jp">
        </div>
      </div>


      <div class="from-group">
        <div class="col-xs-offset-4 col-xs-3 text-right"> 
          <button type="submit" class="btn btn-primary text-center">登録</button>
        </fieldset>
      </div>
    </div>
  </div>
</form>

<?php include('page_footer.php'); ?>