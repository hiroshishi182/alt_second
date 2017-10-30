<?php get_header(); ?>

<div class="wrap">
	<header class="page-header">
		<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
	</header><!-- .page-header -->
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) :
				$post_count = 0; //コード１：最初の2件は全文表示、3件以降は「続きを読む」追加コード
				while ( have_posts() ) : the_post();
					//コード１追加ここから
					$post_count++;
					if ($post_count <= 2) {
						$more = 1;
					} else {
						$more = 0;
					}
					//コード１追加ここまで
					get_template_part( 'content' );
				endwhile;

				the_posts_pagination( array(
					'prev_text' => '&larr;',
					'next_text' => '&rarr;',
				) );
			else :
				echo '記事はありません。';
			endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();