// メニューとURLが一致した場合、メニューの背景色をactiveに変更する。
$(function() {
  $(".nav li a").each(function() {
    var $href = $(this).attr('href');
    var $parent = $(this).parent();
    if(location.href.match($href)) {
        $parent.addClass('active');
    } else {
      $parent.removeClass('active');
    }
  });
});
