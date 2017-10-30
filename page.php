<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()): the_post(); ?> <!-- ループ開始 -->

<?php echo get_the_date(); ?> <!-- 投稿日時を表示 -->
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <!-- 記事タイトルを表示 -->
<?php the_content(); ?><!-- 記事本文を表示 -->

<?php endwhile; endif; ?> <!-- ループ終了 -->

<?php get_footer(); ?>