<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
require('../dbconnect.php');
if(!empty($_POST)){
	// エラー項目の確認
	if ($_POST['name'] == '') {
		$error['name'] = 'blank';
	}
	if ($_POST['email'] == '') {
		$error['email'] = 'blank';
	}
	if (strlen($_POST['password']) < 4) {
		$error['password'] = 'length';
	}
	if ($_POST['password'] == '') {
		$error['password'] = 'blank';
	}
	$fileName = $_FILES['image']['name'];
	if (!empty($fileName)) {
		$ext = substr($fileName, -3);
		if ($ext != 'jpg' && $ext != 'gif') {
			$error['image'] = 'type';
		}
	}

	if (empty($error)) {
		$sql = sprintf('SELECT COUNT(*) AS cnt FROM members WHERE email="%s"',
			mysqli_real_escape_string($db, $_POST['email'])
		);
		$record = mysqli_query($db, $sql) or die(mysqli_error($db));
		$table = mysqli_fetch_assoc($record);
		if ($table['cnt'] > 0) {
			$error['email'] = 'duplicate';
		}
	}
	
	if (empty($error)) {
		// 画像をアップロードする
		$image = date('YmdHis') . $_FILES['icon']['name'];
		echo $image;
		move_uploaded_file($_FILES['icon']['tmp_name'], '../member_picture/' . $image);
		
		$_SESSION['join'] = $_POST;
		$_SESSION['join']['image'] = $image;
		header('Location: check.php');
		exit();
	}
}

//書き直し
if($_REQUEST['action'] == 'rewrite') {
	$_POST = $_SESSION['join'];
	$error['rewrite'] = true;
}

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>会員登録</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../css/base.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="container">
<h1>会員登録</h1>
<p>次のフォームに必要事項を入力してください。</p>
<form action="" method="post" enctype="multipart/form-data" class="well bs-component col-lg-6">
    <dl>
    	<dt>
        ニックネーム
        </dt>
        <dd>
		  <input name="name" type="text" class="form-control" id="name" size="35" maxlength="255" value="<?php echo htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8'); ?>">
        	<?php if ($error['name'] == 'blank'): ?>
			<p class="text-danger">* ニックネームを入力してください</p>
			<?php endif; ?>
        </dd>
    	<dt>
        メールアドレス
        </dt>
        <dd>
		  <input name="email" type="text" class="form-control" id="email" size="35" maxlength="255" value="<?php echo htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8'); ?>">
        	<?php if ($error['email'] == 'blank'): ?>
			<p class="text-danger">* メールアドレスを入力してください</p>
            <?php endif; ?>
        	<?php if ($error['email'] == 'duplicate'): ?>
			<p class="text-danger">* 指定されたメールアドレスはすでに登録されています</p>
			<?php endif; ?>
        </dd>
    	<dt>
        パスワード
        </dt>
        <dd>
		  <input name="password" type="password" class="form-control" id="password" size="10" maxlength="20" value="<?php echo htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8'); ?>">
        	<?php if ($error['password'] == 'blank'): ?>
			<p class="text-danger">* パスワードを入力してください</p>
			<?php endif; ?>
        	<?php if ($error['password'] == 'length'): ?>
			<p class="text-danger">* パスワードは4文字以上で入力してください</p>
			<?php endif; ?>
        </dd>
    	<dt>
        アイコン
        </dt>
        <dd>
		  <input name="icon" type="file" class="form-control" id="icon">
        	<?php if ($error['image'] == 'type'): ?>
			<p class="error">* 写真などは「.gif」または「.jpg」の画像を指定してください</p>
			<?php endif; ?>
        	<?php if (!empty($error)): ?>
			<p class="error">* 恐れ入りますが、画像を改めて指定してください</p>
			<?php endif; ?>
        </dd>
    </dl>
    <input name="reset" type="reset" class="btn btn-default" value="リセット">
    <input type="submit" class="btn btn-primary " value="確認する">
</form>
</div>

</body>
</html>
