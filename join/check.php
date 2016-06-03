<?php
session_start();
require('../dbconnect.php');

if (!isset($_SESSION['join'])) {
	header('Location: index.php'); 
	exit();
}

if (!empty($_POST)) {
	// 登録処理をする
	$sql = sprintf('INSERT INTO members SET name="%s", email="%s", password="%s", icon="%s", created="%s"',
		mysqli_real_escape_string($db, $_SESSION['join']['name']),
		mysqli_real_escape_string($db, $_SESSION['join']['email']),
		mysqli_real_escape_string($db, sha1($_SESSION['join']['password'])),
		mysqli_real_escape_string($db, $_SESSION['join']['image']),
		date('Y-m-d H:i:s')
	);
	mysqli_query($db, $sql) or die(mysqli_error($db));
	unset($_SESSION['join']);

	header('Location: thanks.php');
	exit();
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../css/base.css" rel="stylesheet" type="text/css">
<title>会員登録</title>
</head>

<body>
<div class="container">
<h1>会員登録</h1>
<p>記入した内容を確認して、「登録する」ボタンをクリックしてください</p>
<form action="" method="post" class="well bs-component col-lg-6">
	<input type="hidden" name="action" value="submit"/>
	<dl>
		<dt>ニックネーム</dt>
		<dd>
		<?php echo htmlspecialchars($_SESSION['join']['name'], ENT_QUOTES, 'UTF-8'); ?>
        </dd>
		<dt>メールアドレス</dt>
		<dd>
		<?php echo htmlspecialchars($_SESSION['join']['email'], ENT_QUOTES, 'UTF-8'); ?>
        </dd>
		<dt>パスワード</dt>
		<dd>
		【表示されません】
		</dd>
		<dt>写真など</dt>
		<dd>
        <img src="../member_picture/<?php echo htmlspecialchars($_SESSION['join']['image'], ENT_QUOTES, 'UTF-8'); ?>" width="100" height="100" alt="" />
		</dd>
	</dl>
	<div><a href="index.php?action=rewrite">&laquo;&nbsp;書き直す</a> | <input type="submit" class="btn btn-primary" value="登録する" /></div>
</form>
</div>
</body>
</html>
