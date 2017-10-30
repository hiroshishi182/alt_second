<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php wp_head(); ?>
<?php wp_deregister_script('jquery'); ?><!-- WordPressのjQueryを読み込ませない -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/reset.css" type="text/css" />
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/drawer.css" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.1.3/iscroll.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/drawer.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/pageTop.js"></script>
<script>
$(document).ready(function() { $(".drawer").drawer(); });

//ページ内リンク後にナビを閉じる
// $(document).ready(function() {
//   $('.drawer').drawer();
// $('#g-navi li a').on('click', function() {
//   $('.drawer').drawer('close');
// });
// });

</script>
</head>
<body class="drawer drawer--right">
<?php include_once("svg/svg-defs.svg"); ?>
<div id="page-contaner">
	<header>
		<?php include 'nav.php'; ?>
		<?php //bloginfo('description'); ?>
		<?php //wp_nav_menu(); ?>
	</header>

