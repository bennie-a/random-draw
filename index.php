<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>お絵かき出題アプリ|トップ画面</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/base.css" rel="stylesheet" type="text/css">
<link href="css/position.css" rel="stylesheet" type="text/css">
<link href="css/layout.css" rel="stylesheet" type="text/css">
</head>

<body>
	<!-- <header class="navbar navbar-inverse navbar-fixed-top">
		<div class="col-sm-11">
			<div class="navbar-header">
				<a href="/" class="navbar-brand">お絵かき出題アプリ</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a class="btn btn-default" href="login.php">ログアウト</a></li>
				</ul>
			</div>
		</div>
	</header> -->
<div class="container-fluid">
	<div class="row-fluid contents">
		<div class="sidemenu col-md-2">
			<a class="logo" href="#">お絵かき出題アプリ</a>
			<nav class="sidebar-nav" role="complementary">
				<figure>
						<img src="member_picture/<?php echo $_SESSION['icon']; ?>" class="icon" />
						<figcaption><?php echo $_SESSION['name']; ?></figcaption>
				</figure>
				<ul class="nav nav-pills nav-stacked">
					<li><a href="post/index.php">絵を描く</a></li>
					<li><a href="#">みんなのお絵かき</a></li>
					<li><a href="#">アップロード履歴</a></li>
				</ul>
				<div class="btn_area">
					<a href="#" class="btn btn-default btn-sm">ログアウト</a>
				</div>
			</nav>
		</div>
			<main class="col-md-10" role="main">
				<article id="start" class="jumbotron row">
					<p class="lead">紙と鉛筆の用意はできましたか？ではさっそく始めましょう！</p>
					<a href="post/index.php" class="btn btn-danger btn-lg">絵を描く</a>
				</article>
				<div class="row">
					<article class="bs-component card-list">
								<div class="panel panel-default">
				            <div class="panel-body">
				              パネルの内容
				            </div>
										<div class="panel-footer">パネルの見出し</div>
				        </div>
								<div class="panel panel-default">
				            <div class="panel-body">
				              パネルの内容
				            </div>
										<div class="panel-footer">パネルの見出し</div>
				        </div>
								<div class="panel panel-default">
				            <div class="panel-body">
				              パネルの内容
				            </div>
										<div class="panel-footer">パネルの見出し</div>
				        </div>
								<div class="panel panel-default">
				            <div class="panel-body">
				              パネルの内容
				            </div>
										<div class="panel-footer">パネルの見出し</div>
				        </div>
								<div class="panel panel-default">
				            <div class="panel-body">
				              パネルの内容
				            </div>
										<div class="panel-footer">パネルの見出し</div>
				        </div>
								<div class="panel panel-default">
				            <div class="panel-body">
				              パネルの内容
				            </div>
										<div class="panel-footer">パネルの見出し</div>
				        </div>
								<div class="panel panel-default">
				            <div class="panel-body">
				              パネルの内容
				            </div>
										<div class="panel-footer">パネルの見出し</div>
				        </div>
								<div class="panel panel-default">
				            <div class="panel-body">
				              パネルの内容
				            </div>
										<div class="panel-footer">パネルの見出し</div>
				        </div>
								<a href="#" class="btn btn-default btn-lg">もっと見る→</a>
					</article>
				</div>
			</main>
	</div>
</div>
</body>
</html>
