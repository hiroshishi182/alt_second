<div id="g-navi-wrapper">
	<div id="head-logo">
		<a href="<?php echo home_url() ?>"><svg id="logo"><title>Alternative Design</title><use xlink:href="#logo"></use></svg></a>
		<!--<a href="<?php echo home_url() ?>"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php echo bloginfo('name'); ?>" /></a>-->
	</div>
	<button type="button" class="drawer-toggle drawer-hamburger">
		<span class="sr-only">toggle navigation</span>
		<span class="drawer-hamburger-icon"></span>
	</button>
	<div class="drawer-nav">
		<nav>
		    <?php wp_nav_menu( array(
		            'theme_location'=> 'mainmenu',
		            'container'     => '', 
		            'menu_class'    => '',
		            'items_wrap'    => '<ul class="drawer-menu" id="g-navi">%3$s</ul>'));
		    ?>
		</nav>
		<div id="head-info">
			<h1>Alternative Design</h1>
			<ul id="head-info-01">
				<li>Toyokawa, Aichi, Japan</li>
			</ul>
			<ul id="head-sns">
				<li><a href="https://www.facebook.com/" target="_blank"><svg><use xlink:href="#insta"></use></svg></a></li>
				<li><a href="https://www.instagram.com/" target="_blank"><svg><use xlink:href="#fb"></use></svg></a></li>
				<li><a href="https://twitter.com/" target="_blank"><svg><use xlink:href="#twitter"></use></svg></a></li>
			</ul>
		</div>
	</div>
</div>
