<?php
	error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	require('../util/files.php');
	unset($_SESSION['theme']);

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>お絵かき出題アプリ|投稿できました!</title>
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
			<div id="contents-panel" class="panel panel-default">
				<article class="row">
					<div id="start" class="jumbotron">
						<p class="lead">投稿ありがとうございます！</p>
						<a href="index.php" class="btn btn-danger btn-lg">もう一回描く</a>
					</div>
				</article>
				<div class="panel-body row">
					<article class="bs-component card-list">
							<h2>みんなの答え</h2>
					</article>
				</div>
         </div>
			</main>
		</div>
	</div>
</div>
</body>
</html>
