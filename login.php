<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
require('dbconnect.php');

if ($_COOKIE['email'] != '') {
	$_POST['email'] = $_COOKIE['email'];
	$_POST['password'] = $_COOKIE['password'];
	$_POST['save'] = 'on';
}

if (!empty($_POST)) {
	// ログインの処理
	if ($_POST['email'] != '' && $_POST['password'] != '') {
		$sql = sprintf('SELECT * FROM members WHERE email="%s" AND password="%s"',
			mysqli_real_escape_string($db, $_POST['email']),
			sha1(mysqli_real_escape_string($db, $_POST['password']))
		);
		$record = mysqli_query($db, $sql) or die(mysqli_error($db));
		if ($table = mysqli_fetch_assoc($record)) {
			// ログイン成功
			$_SESSION['id'] = $table['id'];
			$_SESSION['name'] = $table['name'];
			$_SESSION['icon'] = $table['icon'];
			$_SESSION['time'] = time();

			// ログイン情報を記録する
			if ($_POST['save'] == 'on') {
				setcookie('email', $_POST['email'], time()+60*60*24*14);
				setcookie('password', $_POST['password'], time()+60*60*24*14);
			}

			header('Location: index.php');
			exit();
		} else {
			$error['login'] = 'failed';
		}
	} else {
		$error['login'] = 'blank';
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ログイン</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/base.css" rel="stylesheet" type="text/css">
<link href="css/position.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="container">
<h1>ログイン</h1>
<div class="desc">
      <p>メールアドレスとパスワードを記入してログインしてください。</p>
      <p>入会手続きがまだの方はこちらからどうぞ。</p>
      <p>&raquo;<a href="join/">入会手続きをする</a></p>
</div>
<form action="" method="post" class="well bs-component col-lg-6">
    <dl>
    	<dt>
        メールアドレス
        </dt>
        <dd>
		  <input name="email" type="text" class="form-control" id="email" size="35" maxlength="255" value="<?php echo htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8'); ?>">
          <?php if ($error['login'] == 'blank'): ?>
          <p class="text-danger">* メールアドレスとパスワードをご記入ください</p>
          <?php endif; ?>
          <?php if ($error['login'] == 'failed'): ?>
          <p class="text-danger">* ログインに失敗しました。正しくご記入ください。</p>
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
        <dt>ログイン情報の記録</dt>
        <dd>
          <input id="save" type="checkbox" name="save" value="on">
          <label for="save">次回からは自動的にログインする</label>
        </dd>
    </dl>
    <input type="submit" class="btn btn-success " value="ログイン">
</form>
</div>

</body>
</html>
