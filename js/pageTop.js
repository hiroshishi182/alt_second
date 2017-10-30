// スムーズスクロール
$(function(){
	// ページ内リンクをクリックすると
	$('a[href^=#]').click(function(){
 		// スクロールスピード
 		var speed = 500;
 		// クリックしたリンク先を保存
		var href= $(this).attr("href");
		// クリックしたリンク先が#または空のときは
		var target = $(href == "#" || href == "" ? 'html' : href);
		// トップへ移動する
		var position = target.offset().top;
		// リンク先へスムーズに移動する
		$("html, body").animate({scrollTop:position}, speed, "swing");
		return false;
	});
});
