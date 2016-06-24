<?php
	error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	require('../util/files.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>お絵かき出題アプリ|みんなのお絵かき</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../css/base.css" rel="stylesheet" type="text/css">
<link href="../css/layout.css" rel="stylesheet" type="text/css">
<link href="../css/position.css" rel="stylesheet" type="text/css">
<script src="../js/jquery-1.12.4.min.js"></script>
<script src="../js/navi.js"></script>
</head>

<body>
	<div class="container-fluid">
		<div class="row-fluid contents">
			<?php include(get_document_root(). 'global_menu.php'); ?>
			<main class="col-md-10">
			<div id="contents-panel" class="panel panel-default pic-theme-panel">
				<h1>みんなのお絵かき</h1>
				<article class="bs-component card-list">
					<?php
						for ($i = 0; $i < 30; $i++) {
					 ?>
					 <div class="panel panel-default">
							 <div class="panel-body">
								 <div class="user">
									 <img src="http://placehold.jp/59de99/ffffff/30x30.png" alt="" />
									 名前
								 </div>
								 <img src="http://placehold.jp/59de99/ffffff/180x180.png" alt="" />
							 </div>
							 <div class="panel-footer">
								 「タイトル」
							 </div>
					 </div>
					<?php
						}
					?>
				</article>
      </div>
			</main>
		</div>
	</div>
</div>
</body>
</html>
