<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="container">
	<article>
		<div id="inner">
			<section>
				<div id="post-page">
					<?php //カテゴリーを表示
						$cat = get_the_category(); 
						$catname = $cat[0]->cat_name;
						$catslug = $cat[0]->slug;
					?>

					<?php if(have_posts()): while(have_posts()): the_post(); ?>

					<p id="post-date"><?php echo get_the_date(); //投稿日時を表示 ?></p>
					<h1><?php the_title(); //記事タイトルを表示 ?></h1>
					<div id="post-page-content"><?php the_content(); //記事本文を表示?></div>
					<div id="work-category">
						<span class="category <?php echo $catslug; ?>"><?php echo $catname; //カテゴリーを表示 ?></span>
					</div>
					<?php endwhile; endif; ?>
					<div id="work-info">
						<dl><!--題名の出力方法-->
							<dt>Client</dt>
							<dd><?php echo get_post_meta($post->ID, 'book_name', true); ?></dd>
						</dl>
						<dl><!--作者の出力方法-->
							<dt>Item</dt>
							<dd><?php echo get_post_meta($post->ID, 'book_author', true); ?></dd>
						</dl>
						<dl><!--価格の出力方法-->
							<dt>Year</dt>
							<dd><?php echo get_post_meta($post->ID, 'book_price', true); ?></dd>
						</dl>
						<!--ベストセラーラベルの出力方法-->
						<i class="best <?php echo get_post_meta($post->ID, 'book_label', true); ?>"></i>
					</div>
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