<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="text" class="field" name="s" id="s" onblur="if (value == '')  {value = 'Search...';}" onfocus="if (value == 'Search...') value = '';" />
    <input type="submit" class="btn btn-detail" name="submit" value="検索" />
</form>

<div>検索結果：<?php the_search_query(); ?></div>
<?php
global $query_string;
query_posts($query_string . "&post_type=post");
?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>  <!-- キーワードに合った記事を表示させる処理 -->
<div><a href="<?php the_permalink(); ?>"> <?php get_the_title();?> </a> </div>
　　  <?php endwhile; ?>

<?php else: ?>    <!--  キーワードが見つからないときの処理 -->
        <p>キーワードはみつかりません。</p>
<?php endif; ?>
