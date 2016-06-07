<?php
	error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	require('../dbconnect.php');
	require('../util/files.php');
	if(!empty($_POST)){
		$pic_path = file_upload($_FILES['pic'], '../picture/');
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>お絵かき出題アプリ|投稿画面</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../css/base.css" rel="stylesheet" type="text/css">
<link href="../css/layout.css" rel="stylesheet" type="text/css">
<link href="../css/position.css" rel="stylesheet" type="text/css">
</head>

<body>
<header class="navbar col-md-12 navbar-inverse navbar-fixed-top">
	<div class="col-md-11">
		<div class="navbar-header">
			<a href="/" class="navbar-brand">お絵かき出題アプリ</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a class="btn btn-default" href="login.php">ログアウト</a></li>
			</ul>
		</div>
	</div>
</header>
<div class="row col-md-11 contents">
	<div class="col-md-2 sidemenu">
		<nav class="sidebar-nav affix" role="complementary">
			<figure class="col-md-7">
					<img src="../member_picture/<?php echo $_SESSION['icon']; ?>" class="icon" />
					<figcaption><?php echo $_SESSION['name']; ?></figcaption>
			</figure>
			<ul class="nav nav-pills nav-stacked col-md-7">
				<li class="active"><a href="#">絵を描く</a></li>
				<li><a href="#">お絵かき一覧</a></li>
				<li><a href="#">アップロード履歴</a></li>
			</ul>
		</nav>
	</div>
		<main class="col-md-8">
			<h1 class="page-header">投稿</h1>
			<div class="well bs-component col-md-7">
              <form method="post" enctype="multipart/form-data" action="">
              	<dl>
              		<dt>お題の答え</dt>
              		<dd><input type="file" name="pic" class="form-control"></dd>
              		<dt>コメント</dt>
              		<dd><textarea cols="60" rows="5" name="comment" class="form-control"></textarea></dd>
              		<input type="reset" class="btn btn-default btn-lg" value="リセット">
              		<input type="submit" class="btn btn-success btn-lg" value="アップロード">
              	</dl>
              </form>
          </div>
		</main>
</div>
</body>
</html>
