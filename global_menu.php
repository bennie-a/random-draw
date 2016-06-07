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
 </div><!--sidemenu -->
