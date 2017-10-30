<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="container">
	<article>
		<div id="inner">
			<section>
				<div class="post-list-wrapper">
					<h1>NEW POST</h1>
					<ul class="post-list">
						<?php query_posts("post_type=post&posts_per_page=5"); //記事数?>

						<?php if(have_posts()): while(have_posts()): the_post(); //ループ開始 ?>
						<?php //カテゴリーを表示
							$cat = get_the_category(); 
							$catname = $cat[0]->cat_name;
							$catslug = $cat[0]->slug;
						?>

						<?php echo '<li>'. "\n"; ?>
						<a href="<?php the_permalink(); ?>">
						<?php //echo get_the_date(); //投稿日時を表示 ?>
						<?php the_post_thumbnail(); //アイキャッチ画像を表示 ?>
						<?php echo '<h2>';the_title(); echo "</h2>\n"; //記事タイトルを表示?> 
						<?php //the_content(more); //記事本文（全文）を表示 ?>
						<?php echo '<p>'; echo mb_substr(get_the_excerpt(),0,50) ; echo "...</p>\n"; //記事抜粋（文字制限）を表示 ?>
						<span class="<?php echo $catslug; ?>"><?php echo $catname; //カテゴリーを表示 ?></span>
						</a>
						<?php echo '</li>'."\n"; ?>
						<?php endwhile; endif; //ループ終了 ?>
					</ul>
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