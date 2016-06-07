<?php
	error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	// require('../dbconnect.php');
	//
	// $count_sql = 'SELECT COUNT(*) AS cnt FROM words';
	// $record = mysqli_query($db, $count_sql) or die(mysqli_error($db));
	// $table = mysqli_fetch_assoc($record);
	// $error = null;
	// if ($table['cnt'] > 0) {
	// 	$word_id = rand(1, $table['cnt']);
	// 	$sql = sprintf("SELECT word FROM words where id = %d",
	// 		 mysqli_real_escape_string($db, $word_id));
	// 	$record = mysqli_query($db, $sql) or die(mysqli_error($db));
	// 	$table = mysqli_fetch_assoc($record);
	// 	$word = $table['word'];
	// } else {
	// 	$error = "申し訳ありません。現在お題の準備中です。";
	// }

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>お絵かき出題アプリ|出題画面</title>
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
			<main class="col-md-8">
			<div class="panel panel-default pic-theme-panel">
	            <div class="panel-body">
	            	<?php
	            		if (empty($error)) {
	            	?>
							<p>今回のお題はこちら</p>
							<p class="lead">「<?php echo $word; ?>」</p>
							<a href="upload.php" class="btn btn-success btn-feature">投稿する</a>
	            	<?php
	            		} else {
	            	?>
							<p><?php echo $error; ?></p>
	            	<?php
	            		}
	            	?>
	            </div>
	          </div>
			</main>
		</div>
	</div>
</div>
</body>
</html>
