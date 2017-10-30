<a href="#" id="pageTop">TOP</a>
<footer>
	<div id="footer-inner">
		<div id="footer-inner-l">
			<a href="<?php echo home_url() ?>"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo bloginfo('name'); ?>" /></a>
			<ul>
				<li>442-0001</li>
				<li><a href="">愛知県豊川市千両町00-00</a></li>
				<li><a href="tel:00000000000">Tel 0000-00-0000</a></li>
			</ul>
		</div>
		<div id="footer-inner-r">
			<nav>
			    <?php wp_nav_menu( array(
	            'theme_location'=> 'mainmenu',
	            'container'     => '', 
	            'menu_class'    => '',
	            'items_wrap'    => '<ul id="s-navi">%3$s</ul>'));
	    		?>
	    		<ul id="footer-sns">
	    			<li><a href="https://www.facebook.com/" target="_blank"><svg><use xlink:href="#insta"></use></svg></a></li>
	    			<li><a href="https://www.instagram.com/" target="_blank"><svg><use xlink:href="#fb"></use></svg></a></li>
	    			<li><a href="https://twitter.com/" target="_blank"><svg><use xlink:href="#twitter"></use></svg></a></li>
	    		</ul>
			</nav>
		</div>
	</div>
	<small>© Alternative Design</small>
</footer>
</body>
</html>