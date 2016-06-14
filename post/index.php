<?php
	error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	require('../util/files.php');
	require('../dbconnect.php');
	if (empty($_SESSION['theme'])) {
		$count_sql = 'SELECT COUNT(*) AS cnt FROM words';
		$record = mysqli_query($db, $count_sql) or die(mysqli_error($db));
		$table = mysqli_fetch_assoc($record);
		if ($table['cnt'] > 0) {
			$_SESSION['theme']['id'] = rand(1, $table['cnt']);
			$sql = sprintf("SELECT word FROM words where id = %d",
				 mysqli_real_escape_string($db, $_SESSION['theme']['id']));
			$record = mysqli_query($db, $sql) or die(mysqli_error($db));
			$table = mysqli_fetch_assoc($record);
			$_SESSION['theme']['word'] = $table['word'];
		} else {
			$not_use = "申し訳ありません。現在お題の準備中です。";
		}
	}

	
	// 投稿処理
	if(!empty($_POST)){
		if (empty($_FILES['pic']['name'])) {
			$error['pic'] = 'blank';
		}
		if (empty($_POST['comment'])) {
			$error['comment'] = 'blank';
		}
	
		if (empty($error)) {
			$pic_path = file_upload($_FILES['pic'], '../picture/');
			$sql = sprintf('INSERT INTO posts SET member_id="%s", word_id="%s", picture="%s", comment="%s", created="%s"',
				mysqli_real_escape_string($db, $_SESSION['id']),
				mysqli_real_escape_string($db, $_SESSION['theme']['id']),
				mysqli_real_escape_string($db, $pic_path),
				mysqli_real_escape_string($db, $_POST['comment']),
				date('Y-m-d H:i:s')
			);
			mysqli_query($db, $sql) or die(mysqli_error($db));
			header('location: thanks.php');
			unset($_SESSION['theme']);
			exit();
		}
	}
	
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
			<?php include(get_document_root(). 'global_menu.php'); ?>
			<main class="col-md-8">
			<div id="contents-panel" class="panel panel-default pic-theme-panel">
	            <article class="panel-body">
	            	<?php
	            		if (empty($not_use)) {
	            	?>
							<p>今回のお題はこちら</p>
							<p class="lead">「<?php echo $_SESSION['theme']['word']; ?>」</p>
							<div class="panel-contents upload-panel">
								<h2>お絵かきのアップロード</h2>
								<div class="well bs-component col-md-12">
					              <form method="post" enctype="multipart/form-data" action="">
					              	<dl>
					              		<dt class"require">お題の答え(*)</dt>
					              		<dd>
					              			<div class="form-group <?php if (!empty($error['pic'])){echo 'has-error';} ?>">
						              			<input type="file" name="pic" class="form-control">
			              			        	<?php if ($error['pic'] == 'blank'): ?>
														<label class="control-label" for="inputError">画像を選択してください</label>
													<?php endif; ?>
					              			</div>
					              		</dd>
					              		<dt class"require">コメント(*)</dt>
					              		<dd>
					              			<div class="form-group <?php if (!empty($error['comment'])){echo 'has-error';} ?>">
						              			<textarea cols="60" rows="5" name="comment" class="form-control"></textarea>
													<?php if ($error['comment'] == 'blank'): ?>
														<label class="control-label" for="inputError">コメントは必ず入力してください</label>
													<?php endif; ?>
					              			</div>

					              		</dd>
					              		<input type="reset" class="btn btn-default btn-lg" value="リセット">
					              		<input type="submit" class="btn btn-success btn-lg" value="アップロード" onclick="confirm('投稿してもよろしいですか?');">
					              	</dl>
					              </form>
					          </div>
							</div>
	            	<?php
	            		} else {
	            	?>
							<p><?php echo $not_use; ?></p>
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
