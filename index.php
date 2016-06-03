<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
// require('dbconnect.php');
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
</head>

<body>
<header class="navbar col-md-12 navbar-inverse navbar-fixed-top">
	<div class="navbar-header">
		<a href="/" class="navbar-brand">お絵かき出題アプリ</a>
	</div>
	<div class="collapse navbar-collapse">
		<ul class="nav navbar-nav navbar-right">
			<li><a class="btn btn-warning letter_white" href="join/">会員登録</a></li>
			<li><a class="btn btn-default" href="login.php">ログイン</a></li>
		</ul>
	</div>
</header>
<div class="row col-md-11 contents">
	<div class="col-md-2 sidemenu">
		<nav class="sidebar-nav affix" role="complementary">
			<figure class="col-md-7">
					<img src="member_picture/201605170739341af40001acafe9fa2f537d841edbb087_s.jpg" class="icon" />
					<figcaption>ほげほげ</figcaption>
			</figure>
			<ul class="nav nav-pills nav-stacked col-md-7">
				<li><a href="#">絵を描く</a></li>
				<li><a href="#">他の人の絵を見る</a></li>
				<li><a href="#">アップロード履歴</a></li>
			</ul>
		</nav>
	</div>
		<main class="col-md-10">
			<article id="start" class="jumbotron">
				<p class="lead">紙と鉛筆の用意はできましたか？ではさっそく始めましょう！</p>
				<a href="#" class="btn btn-danger btn-lg">絵を描く</a>
			</article>
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
			</article>
		</main>
</div>
</body>
</html>
