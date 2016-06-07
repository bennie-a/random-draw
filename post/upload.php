<?php
	error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	require('../util/files.php');
	require('../dbconnect.php');
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
<script src="../js/jquery-1.12.4.min.js"></script>
<script src="../js/navi.js"></script>
</head>

<body>
<div class="row col-md-11 contents">
	<?php include(get_document_root(). '/global_menu.php'); ?>
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
