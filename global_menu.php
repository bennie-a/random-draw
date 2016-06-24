<?php
	error_reporting(E_ALL & ~E_NOTICE);
	if (empty($_SESSION['id'])) {
		header('Location: login.php');
		exit();
	}
	$dir = get_root().'/member_picture/';
?>
<div class="sidemenu col-md-2">
  <a class="logo" href="<?php echo get_root(); ?>">お絵かき出題アプリ</a>
  <nav class="sidebar-nav" role="complementary">
    <figure>
        <img src="<?php echo $dir.$_SESSION['icon']; ?>" class="icon" />
        <figcaption><?php echo $_SESSION['name']; ?></figcaption>
    </figure>
    <ul class="nav nav-pills nav-stacked">
      <li><a href="<?php echo get_root().'post/'?>">絵を描く</a></li>
      <li><a href="<?php echo get_root().'list/'?>">みんなのお絵かき</a></li>
      <li><a href="#">アップロード履歴</a></li>
    </ul>
    <div class="btn_area">
      <a href="<?php echo get_root()."login.php?action=logout"; ?>" class="btn btn-default btn-sm">ログアウト</a>
    </div>
  </nav>
 </div><!--sidemenu -->
