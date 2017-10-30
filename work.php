<?php
/*
Template Name: Work
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="container">
	<article>
		<div id="inner">
			<div id="page-title">
				<h2>Work</h2>
			</div>
			<section>
				<div class="post-list-wrapper" id="work">
					<ul class="post-list">
						<?php
						$paged = (int) get_query_var('paged');
						$args = array(
							'posts_per_page' => 3,
							'paged' => $paged,
							'orderby' => 'post_date',
							'order' => 'DESC',
							'post_type' => 'post',
							'post_status' => 'publish'
						);
						$the_query = new WP_Query($args);
						if ( $the_query->have_posts() ) :
							while ( $the_query->have_posts() ) : $the_query->the_post();
						?>
						<?php //カテゴリーを表示
							$cat = get_the_category(); 
							$catname = $cat[0]->cat_name;
							$catslug = $cat[0]->slug;
						?>

						<li>
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail(); //アイキャッチ画像を表示 ?>
								<h3><?php the_title(); ?></h3>
								<span class="category <?php echo $catslug; ?>"><?php echo $catname; //カテゴリーを表示 ?></span>
							</a>
							<?php //the_content(); //記事全文 ?>
						</li>
						<?php endwhile; endif; ?>
					</ul>
					<div id="pager">
					<?php
					if ($the_query->max_num_pages > 1) {
						echo paginate_links(array(
							'base' => get_pagenum_link(1) . '%_%',
							'format' => 'page/%#%/',
							'current' => max(1, $paged),
							'total' => $the_query->max_num_pages,
							'type' => 'list'
						));
					}
					?>
					</div>
					<?php wp_reset_postdata(); ?>
					
				</div>
			</section>
		</div>
	</article>
	<div id="pageTop">
		<a href="#"><svg><use xlink:href="#page-top"></use></svg><p>トップへ戻る</p></a>
	</div>
</div>

<!-- サイドバー -->
<div id="sidebar">
<ul>
<?php //dynamic_sidebar(); ?>
</ul>
</div><!-- /サイドバー -->


<?php get_footer(); ?>